<template>
    <b-modal
        v-model="modalShow"
        scrollable
        centered
        no-close-on-backdrop
        no-close-on-esc
        hide-header-close
        hide-header
        size="lg"
        content-class="custom-modal"
    >

        <template slot="modal-header">
            <h3><i class="fas fa-people-carry"></i> {{ $t('detail') }}</h3>
        </template>
        <div class="d-block">
            <b-row>
                <b-col cols="12">
                    <b-card>
                        <b-tabs card>
                            <b-tab :title="$t('borrower')" active>
                                <b-row>
                                    <b-col cols="6">
                                        {{ $t('first_name') }}:
                                        <b>{{ formItem.borrower_first_name }}</b>
                                    </b-col>
                                    <b-col cols="6">
                                        {{ $t('gender') }}:
                                        <b v-if="formItem.borrower_gender == 1">{{ $t('male') }}</b>
                                        <b v-if="formItem.borrower_gender == 2">{{ $t('female') }}</b>
                                    </b-col>
                                </b-row>
                                <hr>
                                <b-row>
                                    <b-col cols="6">
                                        {{ $t('last_name') }}:
                                        <b>{{ formItem.borrower_last_name }}</b>
                                    </b-col>
                                    <b-col cols="6">
                                        {{ $t('dob') }}:
                                        <b>{{ formItem.borrower_dob }}</b>
                                    </b-col>
                                </b-row>
                                <hr>
                                <b-row>
                                    <b-col cols="6">
                                        {{ $t('business_name') }}:
                                        <b>{{ formItem.borrower_business_name }}</b>
                                    </b-col>
                                    <b-col cols="6">
                                        {{ $t('email') }}:
                                        <b>{{ formItem.borrower_email }}</b>
                                    </b-col>
                                </b-row>
                                <hr>
                                <b-row>
                                    <b-col cols="6">
                                        {{ $t('phone') }}:
                                        <b>{{ formItem.borrower_phone }}</b>
                                    </b-col>
                                    <b-col cols="6">
                                        {{ $t('alt_phone') }}:
                                        <b>{{ formItem.borrower_alt_phone }}</b>
                                    </b-col>
                                </b-row>
                                <hr>
                                <b-row>
                                    <b-col cols="6">
                                        {{ $t('address') }}:
                                        <span>{{ formItem.borrower_address }}</span>
                                    </b-col>
                                </b-row>
                            </b-tab>
                            <b-tab :title="$t('guarantor')">
                                <b-row>
                                    <b-col cols="6">
                                        {{ $t('first_name') }}:
                                        <b>{{ formItem.guarantor_first_name }}</b>
                                    </b-col>
                                    <b-col cols="6">
                                        {{ $t('gender') }}:
                                        <b v-if="formItem.guarantor_gender == 1">{{ $t('male') }}</b>
                                        <b v-if="formItem.guarantor_gender == 2">{{ $t('female') }}</b>
                                    </b-col>
                                </b-row>
                                <hr>
                                <b-row>
                                    <b-col cols="6">
                                        {{ $t('last_name') }}:
                                        <b>{{ formItem.guarantor_last_name }}</b>
                                    </b-col>
                                    <b-col cols="6">
                                        {{ $t('dob') }}:
                                        <b>{{ formItem.guarantor_dob }}</b>
                                    </b-col>
                                </b-row>
                                <hr>
                                <b-row>
                                    <b-col cols="6">
                                        {{ $t('business_name') }}:
                                        <b>{{ formItem.guarantor_business_name }}</b>
                                    </b-col>
                                    <b-col cols="6">
                                        {{ $t('email') }}:
                                        <b>{{ formItem.guarantor_email }}</b>
                                    </b-col>
                                </b-row>
                                <hr>
                                <b-row>
                                    <b-col cols="6">
                                        {{ $t('phone') }}:
                                        <b>{{ formItem.guarantor_phone }}</b>
                                    </b-col>
                                    <b-col cols="6">
                                        {{ $t('alt_phone') }}:
                                        <b>{{ formItem.guarantor_alt_phone }}</b>
                                    </b-col>
                                </b-row>
                                <hr>
                                <b-row>
                                    <b-col cols="6">
                                        {{ $t('address') }}:
                                        <span>{{ formItem.guarantor_address }}</span>
                                    </b-col>
                                </b-row>
                            </b-tab>
                            <b-tab :title="$t('loan')">
                                <b-row>
                                    <b-col cols="6">
                                        {{ $t('company_name') }}:
                                        <b>{{ formItem.company_name }}</b>
                                    </b-col>
                                     <b-col cols="6">
                                        {{ $t('request_date') }}:
                                        <b>{{ formItem.request_date | dateTimeFormat }}</b>
                                    </b-col>
                                </b-row>
                                <hr>
                                <b-row>
                                     <b-col cols="6">
                                        {{ $t('request_amount') }}:
                                        <b>$ {{ formItem.request_amount }}</b>
                                    </b-col>
                                    <b-col cols="6">
                                        {{ $t('term') }}:
                                        <b>{{ formItem.term }} {{ $t('month') }}</b>
                                    </b-col>
                                </b-row>
                                <hr>
                                <b-row>
                                     <b-col cols="6">
                                        {{ $t('interest') }}:
                                        <b>{{ formItem.interest }} %</b>
                                    </b-col>
                                    <b-col cols="6">
                                        {{ $t('outstanding_amount') }}:
                                        <b>$ {{ formItem.outstanding_amount }}</b>
                                    </b-col>
                                </b-row>
                            </b-tab>
                        </b-tabs>
                    </b-card>
                </b-col>
            </b-row>
        </div>
        <template slot="modal-footer">
            <b-button variant="outline-danger" @click="clearForm" class="float-right">
                <i class="fas fa-times-circle mr-1"></i>
                {{ $t('close') }}
            </b-button>
        </template>
    </b-modal>
</template>
<script>
export default {
    props: {
        modalType: {
            type: Number,
            default: () => {
                return 0
            }
        },
        formItem: {
            type: Object,
            default: () => {
                return {}
            }
        }
    },
    data(){
        return{
            modalShow: false,
        }
    },
    watch: {
        modalType: {
            handler(val){
                if(val == 1){
                    this.modalShow = true
                }else{
                    this.modalShow = false
                }
            },
            immediate: true
        }
    },
    methods: {
        clearForm(){

            this.$emit('closeModal')

            this.modalShow = false;

        },
    }
}
</script>
<style scoped>
/deep/ .custom-modal{
    border-radius: 15px;
}
</style>
