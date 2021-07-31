<template>
    <div style="width: 99%">
        <div v-if="modalDetailShow">
            <modal-detail
                :modalType="modalDetailType"
                :formItem="formItem"
                @closeModal="clsoeDetailModal"
            ></modal-detail>
        </div>

        <b-card no-body class="card-table">
            <b-card-header>
                <h1>{{ $t('borrower') }}</h1>
                <b-row>
                    <b-col cols="6">
                        <b-button variant="outline-secondary" @click="fetchRecord">
                            <i class="fa fa-sync"></i>
                            {{ $t('refresh') }}
                        </b-button>
                        <b-button :disabled="showButtonDetail" @click="openDetailModal" variant="outline-info">
                            <i class="fa fa-eye"></i>
                            {{ $t('detail') }}
                        </b-button>
                    </b-col>
                    <b-col cols="5">
                        <b-input-group>
                            <b-form-input
                                id="filter-input"
                                v-model="filter.search"
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
                            <template v-slot:cell(gender)="row">
                                <div v-if="row.item.gender == 1">{{ $t('male') }}</div>
                                <div v-if="row.item.gender == 2">{{ $t('female') }}</div>
                            </template>

                            <template v-slot:cell(dob)="row">
                                {{ row.item.dob | dateFormat }}
                            </template>

                            <template v-slot:cell(phone)="row">
                                {{ row.item.phone | phoneFormat }}
                            </template>

                            <template v-slot:cell(alt_phone)="row">
                                {{ row.item.alt_phone | phoneFormat }}
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
</template>

<script>
    import { mapGetters } from 'vuex'
    export default {
        data(){
          return{
              items: [],
              selectedItem: {},
              showButtonDetail: true,
              modalDetailShow: false,
              modalDetailType: 0,
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
                  search: null
              },
          }
        },
        components: {
            ModalDetail: () => import('./components/ModalDetail')
        },
        created(){
            this.fetchRecord()
        },
        computed: {
            ...mapGetters({
            }),
            header(){
                return [
                    {
                        key: 'first_name',
                        label: this.$t('first_name'),
                        sortable: true,
                    },
                    {
                        key: 'last_name',
                        label: this.$t('last_name'),
                        sortable: true,
                    },
                    {
                        key: 'gender',
                        label: this.$t('gender'),
                        sortable: true,
                    },
                    {
                        key: 'dob',
                        label: this.$t('dob'),
                        sortable: true,
                    },
                    {
                        key: 'email',
                        label: this.$t('email'),
                        sortable: true,
                    },
                    {
                        key: 'phone',
                        label: this.$t('phone'),
                        sortable: true,
                    },
                    {
                        key: 'alt_phone',
                        label: this.$t('alt_phone'),
                        sortable: true,
                    },
                    {
                        key: 'business_name',
                        label: this.$t('business_name'),
                        sortable: true,
                    },

                ]
            }
        },
        methods: {
            fetchRecord(){
                let vm = this;
                const input = this.getInput();

                axios.post('/borrower/get', input).then(function (response) {
                    vm.setInput(response.data.data);

                    }).catch(function (error) {
                        console.log(error)
                    });
            },
            getInput() {
                return {
                    page: this.pagination.current_page,
                    table_size: this.pagination.table_size,
                    filter: this.filter
                }
            },
            setInput(data) {
                this.items = data.data
                this.pagination.total = data.pagination.total
                this.pagination.from = data.pagination.from
                this.pagination.to = data.pagination.to
            },
            rowItem(event){
                if(event.length>0){
                    this.selectedItem = event[0];
                    this.showButtonDetail = false
                }else{
                    this.showButtonDetail = true
                    this.selectedItem = {};
                }
            },
            openDetailModal(){
                this.formItem = Object.assign({}, this.selectedItem)

                this.modalDetailShow = true
                this.modalDetailType = 1 //set modal type 1 = save
            },
            clsoeDetailModal(){
                this.formItem = {}

                this.modalDetailType = 0;
                this.modalDetailShow = false
            },
        }
    }
</script>
<style scoped>
.badge {
    display: inline-block;
    padding: 0.6em 0.4em;
    font-size: 75%;
    font-weight: 700;
    line-height: 1;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: 0.25rem;
    transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
.badge-pill {
    padding-right: 1.6em;
    padding-left: 1.6em;
    border-radius: 10rem;
}
</style>
