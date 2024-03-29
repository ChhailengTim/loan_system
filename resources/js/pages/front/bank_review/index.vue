<template>
    <div>
        <header-page></header-page>

        <div class="justify-content-center" style="margin-top: 9rem;">
            <b-card no-body class="card-table">
                <b-card-header>
                    <h2 v-if="$i18n.locale == 'en'">Loan Requested</h2>
                    <h2 v-if="$i18n.locale == 'kh'">ប្រាក់កម្ចីដែលបានស្នើសុំ</h2>
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
                        <b-col >
                            <b-form-group
                                class="text-left"
                            >
                                <b-select
                                    v-model="company_id"
                                    @change="onSelectCompany"
                                >
                                    <template slot="first">
                                        <b-form-select-option :value="null" disabled>
                                            {{ $t('company') }}
                                        </b-form-select-option>
                                    </template>
                                    <b-form-select-option v-for=" (obj, index) in companySelectData" :value="obj.id" :key="index">{{ obj.company_name }}</b-form-select-option>
                                </b-select>
                            </b-form-group>
                        </b-col>
                        <b-col >
                            <b-input-group>
                                <b-form-input
                                    id="filter-input"
                                    v-model="filter.search"
                                    type="search"
                                    :placeholder="$t('search')"
                                    @input="fetchRecord(false)"
                                ></b-form-input>
                            </b-input-group>
                        </b-col>
                        <b-col cols="1">
                            <b-form-select
                                v-model="pagination.table_size"
                                @input="fetchRecord"
                            >
                                <b-form-select-option value="5">5</b-form-select-option><b-form-select-option value="10">10</b-form-select-option>
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
                                :fields="header"
                                :items="items"
                                @row-selected="rowItem"
                            >
                                <template v-slot:cell(borrower_name)="row">
                                    {{ row.item.borrower_first_name }} {{ row.item.borrower_last_name }}
                                </template>

                                <template v-slot:cell(guarantor_name)="row">
                                    {{ row.item.guarantor_first_name }} {{ row.item.guarantor_last_name }}
                                </template>

                                <template v-slot:cell(request_date)="row">
                                    {{ row.item.request_date | dateTimeFormat }}
                                </template>

                                <template v-slot:cell(request_amount)="row">
                                    $ {{ row.item.request_amount }}
                                </template>

                                <template v-slot:cell(term)="row">
                                    {{ row.item.term }} {{ $t('month') }}
                                </template>

                                <template v-slot:cell(interest)="row">
                                    {{ row.item.interest }}
                                </template>

                                <template v-slot:cell(outstanding_amount)="row">
                                    $ {{ row.item.outstanding_amount }}
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
        <div v-if="modalDetailShow">
            <modal-detail
                :modalType="modalDetailType"
                :formItem="formItem"
                @closeModal="clsoeDetailModal"
            ></modal-detail>
        </div>
    </div>
</template>

<script>
    import { mapGetters } from 'vuex'
    import headerPage from '../components/header'
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
                  table_size: 5,
              },
              company_id: null,
              companySelectData: null,
              filter: {
                  search: null
              },
          }
        },
        components: {
            headerPage,
            ModalDetail: () => import('./components/ModalDetail')
        },
        created(){
            this.getCompanyList()
        },
        computed: {
            ...mapGetters({
            }),
            header(){
                return [
                    {
                        key: 'borrower_name',
                        label: this.$t('borrower_name'),
                        sortable: true,
                    },
                    {
                        key: 'guarantor_name',
                        label: this.$t('guarantor_name'),
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
                        key: 'status',
                        label: this.$t('status'),
                        sortable: true,
                    },

                ]
            }
        },
        methods: {
            getCompanyList(){
                axios.post('/company/get_all', { loading: false }).then(response => {
                    if(response.status == 200){
                        this.companySelectData = response.data.data
                    }
                });
            },
            onSelectCompany(){
                this.fetchRecord()
            },
            fetchRecord(loading = true){
                let vm = this;
                const input = this.getInput();
                input.loading = loading

                axios.post('/loan/get_by_company', input).then(function (response) {
                    vm.setInput(response.data.data);

                    }).catch(function (error) {
                        console.log(error)
                    });
            },
            getInput() {
                return {
                    page: this.pagination.current_page,
                    table_size: this.pagination.table_size,
                    filter: this.filter,
                    company_id: this.company_id
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
            clsoeDetailModal(type){
                this.formItem = {}

                this.modalDetailType = 0;
                this.modalDetailShow = false

                if(type !== 'close'){
                    this.fetchRecord()
                }
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
