<template>
    <b-modal
        v-model="modal"
        scrollable
        centered
        no-close-on-backdrop
        no-close-on-esc
        hide-header-close
        size="xl"
        content-class="custom-modal"
        hide-header
    >
        <div class="d-block" >
            <b-row>
                <b-col cols="6" md="3" xl="3">
                    <!--photo-->
                        <label for="">{{ $t('photo') }}</label>
                        <div v-if="$helpers.nullToVoid(formItem.borrower_photo) == ''">
                            <i
                                class="fas fa-image"
                                style="font-size: 150px; color: #a0aec0"
                            ></i>
                        </div>
                        <div v-else>
                            <b-img
                                :src="formItem.borrower_photo"
                                alt="photo"
                                width="150"
                                height="150"
                                rounded
                            />
                        </div>
                </b-col>

                <b-col cols="6" md="3" xl="3">
                    <!--national_id-->
                        <label for="">{{ $t('national_id') }}</label>
                        <div v-if="$helpers.nullToVoid(formItem.borrower_national_photo) == ''">
                            <i
                                class="fas fa-image"
                                style="font-size: 150px; color: #a0aec0"
                            ></i>
                        </div>
                        <div v-else>
                            <b-img
                                :src="formItem.borrower_national_photo"
                                alt="national"
                                width="150"
                                height="150"
                                rounded
                            />
                        </div>
                </b-col>

                <b-col cols="6" md="3" xl="3">
                    <!--family_book-->
                        <label for="">{{ $t('family_book') }}</label>
                        <div v-if="$helpers.nullToVoid(formItem.borrower_family_book) == ''">
                            <i
                                class="fas fa-image"
                                style="font-size: 150px; color: #a0aec0"
                            ></i>
                        </div>
                        <div v-else>
                            <b-img
                                :src="formItem.borrower_family_book"
                                alt="family_book"
                                width="150"
                                height="150"
                                rounded
                            />
                        </div>
                </b-col>

                <b-col cols="6" md="3" xl="3">
                    <!--mortgage-->
                        <label for="">{{ $t('mortgage') }}</label>
                        <div v-if="$helpers.nullToVoid(formItem.borrower_mortgage) == ''">
                            <i
                                class="fas fa-image"
                                style="font-size: 150px; color: #a0aec0"
                            ></i>
                        </div>
                        <div v-else>
                            <b-img
                                :src="formItem.borrower_mortgage"
                                alt="mortgage"
                                width="150"
                                height="150"
                                rounded
                            />
                        </div>
                </b-col>

                <b-col cols="6" md="3" xl="3">
                    <!--salary_invoice-->
                        <label for="">{{ $t('salary_invoice') }}</label>
                        <div v-if="$helpers.nullToVoid(formItem.borrower_photo) == ''">
                            <i
                                class="fas fa-image"
                                style="font-size: 150px; color: #a0aec0"
                            ></i>
                        </div>
                        <div v-else>
                            <b-img
                                :src="formItem.borrower_salary_photo"
                                alt="salary_invoice"
                                width="150"
                                height="150"
                                rounded
                            />
                        </div>
                </b-col>
            </b-row>
        </div>
        <template slot="modal-footer">
            <b-button variant="outline-danger" @click="closeModal" class="float-right">
                <i class="fas fa-times-circle mr-1"></i>
                {{ $t('close') }}</b-button>
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
            modal: false,
        }
    },
    watch: {
        modalType: {
            handler(val){
                if(val == 1){
                    this.modal = true
                }else{
                    this.modal = false
                }
            },
            immediate: true
        }
    },
    methods: {
        closeModal(){

            this.$emit('closeModal')
            this.modal = false;
        },
    }
}
</script>
<style scoped>
/deep/ .custom-modal{
    border-radius: 15px;
}
</style>
