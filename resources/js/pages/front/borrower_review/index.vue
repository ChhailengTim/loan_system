<template>
    <div>
        <header-page></header-page>

        <div class="justify-content-center" style="margin-top: 6rem;">
            <b-card no-body class="card-table">
                <b-card-header>
                    <h1>{{ $t('Review') }}</h1>
                    <b-row>
                        <b-col cols="6">
                            <b-button variant="outline-secondary" @click="fetchRecord">
                                <i class="fa fa-sync"></i>
                                {{ $t('refresh') }}
                            </b-button>
                            <b-button :disabled="showDelete" @click="editRecord" variant="outline-info">
                                <i class="fa fa-eye"></i>
                                {{ $t('view') }}
                            </b-button>
                        </b-col>
                        <b-col cols="5">
                            <b-input-group>
                                <b-form-input
                                    id="filter-input"
                                    v-model="filter.txt_src"
                                    type="search"
                                    placeholder="Type to Search"
                                ></b-form-input>
                            </b-input-group>
                        </b-col>
                        <b-col cols="1">
                            <b-form-select
                                v-model="pagination.table_size"
                                @input="fetchRecord"
                            >
                                <b-form-select-option value="10">10</b-form-select-option>
                                <b-form-select-option value="50">50</b-form-select-option>
                                <b-form-select-option value="100">100</b-form-select-option>
                                <b-form-select-option value="1000">1000</b-form-select-option>
                            </b-form-select>
                        </b-col>
                    </b-row>
                </b-card-header>
                <b-card-body>
                    <b-row>
                        <b-col cols="12">
                            <b-table
                                selectable
                                select-mode="single"
                                selected-variant="primary"
                                show-empty
                                hover
                                striped
                                :filter="filter.txt_src"
                                :fields="header"
                                :items="items"
                                @row-selected="rowItem"
                            >
                                <template v-slot:cell(request_date)="row">
                                    {{ row.item.request_date | dateFormat }}
                                </template>

                                <template v-slot:cell(request_amount)="row">
                                    $ {{ row.item.request_amount }}
                                </template>

                                <template v-slot:cell(tem)="row">
                                    {{ row.item.tem }} {{ $t('month') }}
                                </template>

                                <template v-slot:cell(interest)="row">
                                    {{ row.item.interest }} %
                                </template>

                                <template v-slot:cell(outstanding_amount)="row">
                                    $ {{ row.item.outstanding_amount }}
                                </template>

                                <template v-slot:cell(guarantor_name)="row">
                                    {{ row.item.guarantor_first_name }} {{ row.item.guarantor_last_name }}
                                </template>

                                <template v-slot:cell(appointment_date)="row">
                                    {{ row.item.appointment_date | dateFormat }}
                                </template>

                                <template v-slot:cell(status)="row">
                                <b-badge pill v-if="row.item.status == 'Pending'" variant="primary">{{ $t('pending') }}</b-badge>
                                <b-badge pill v-if="row.item.status == 'Approved'" variant="success">{{ $t('approved') }}</b-badge>
                                <b-badge pill v-if="row.item.status == 'Rejected'" variant="danger">{{ $t('rejected') }}</b-badge>
                            </template>

                            </b-table>
                        </b-col>
                    </b-row>
                </b-card-body>
                <b-card-footer>
                    <b-col cols="12">
                        <b-pagination
                                    v-model="pagination.current_page"
                                    :total-rows="pagination.total"
                                    :per-page="pagination.table_size"
                                    @input="fetchRecord"
                        ></b-pagination>
                    </b-col>
                </b-card-footer>
            </b-card>
        </div>
    </div>
</template>

<script>
    import { mapGetters } from 'vuex'
    import store from '../../../store';
    import headerPage from '../components/header'
    export default {
        data(){
          return{
              items: [],
              selectedItem: {},
              showDelete:true,
              showOverlay:false,
              modalShow:false,
              modalType: 0,
              formItem: {},
              pagination: {
                  current_page: 1,
                  per_page: 10,
                  total: 0,
                  to: 0,
                  from: 0,
                  last_page: 0,
                  table_size: 10,
              },
              filter: {
              },
          }
        },
        components: {
            headerPage
        },
        created(){
            if(this.$helpers.nullToVoid(localStorage.borrower_id) == ''){
                window.location.href = '/front/home'
            }else{
                this.fetchRecord()
            }
        },
        computed: {
            ...mapGetters({
            }),
            header(){
                return [
                    {
                        key: 'company_name',
                        label: this.$t('compnay_name'),
                        sortable: true,
                    },
                    {
                        key: 'request_date',
                        label: this.$t('request_date'),
                        sortable: true,
                    },
                    {
                        key: 'request_amount',
                        label: this.$t('request_amount'),
                        sortable: true,
                    },
                    {
                        key: 'term',
                        label: this.$t('term'),
                        sortable: true,
                    },
                    {
                        key: 'interest',
                        label: this.$t('interest'),
                        sortable: true,
                    },
                    {
                        key: 'outstanding_amount',
                        label: this.$t('outstanding_amount'),
                        sortable: true,
                    },
                    {
                        key: 'guarantor_name',
                        label: this.$t('guarantor_name'),
                        sortable: true,
                    },
                    {
                        key: 'appointment_date ',
                        label: this.$t('appointment_date '),
                        sortable: true,
                    },
                    {
                        key: 'status',
                        label: this.$t('status'),
                        sortable: true,
                    },

                ]
            }
        },
        methods: {
            addRecord(){
                this.modalShow = true
                this.modalType = 1 //set modal type 1 = save
            },
            editRecord(){
                this.modalShow = true;
                this.formItem = Object.assign({}, this.selectedItem)
                this.modalType = 2 //set modal type 2 = edit
            },
            fetchRecord(){
                let vm = this;
                const input = this.getInput();

                axios.post('/loan/borrower_review_list', input).then(function (response) {
                    vm.setInput(response.data.data);

                    }).catch(function (error) {
                        console.log(error)
                    });
            },
            deleteItem(){
                this.$fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                    allowOutsideClick: false,
                    allowEscapeKey: false
                }).then((result) => {
                    if (result.value) {
                        let vm = this;
                        axios.post('/worker/delete', {id: this.selectedItem.id,}).then(function (response) {
                            vm.fetchRecord();

                            vm.$fire({
                                position: 'top-end',
                                type: 'success',
                                title: 'Your work has been saved',
                                showConfirmButton: false,
                                backdrop: false,
                                toast:true,
                                timer: 2000
                            });

                        });
                    }
                });
            },
            rowItem(event){
                if(event.length>0){
                    this.selectedItem = event[0];
                    this.showDelete = false
                }else{
                    this.showDelete = true
                    this.selectedItem = {};
                }
            },
            closeModal(obj){
                this.modalType = 0;
                this.modalShow = false

                if(!this.$helpers.isEmpty(obj)){
                    this.fetchRecord();
                }
            },
            getInput() {
                return {
                    page: this.pagination.current_page,
                    table_size: this.pagination.table_size,
                    filter: this.filter,
                    borrower_id: localStorage.borrower_id
                }
            },
            setInput(data) {
                this.items = data.data
                this.pagination.total = data.pagination.total
                this.pagination.from = data.pagination.from
                this.pagination.to = data.pagination.to
            },
        }
    }
</script>
<style scoped>
</style>
