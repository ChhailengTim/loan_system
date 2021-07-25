<template>
    <div>
        <headerPage></headerPage>

        <b-card-body class="px-0" style="margin-top: 6rem;">
            <b-col sm="12" md="12" xl="12">
                <b-card>
                    <b-card-header>
                        <b-col cols="12" >
                            <p style="font-size: x-large;" align="center">{{ $t('request_loan') }}</p>
                        </b-col>
                    </b-card-header>

                    <b-card-body>
                        <b-col cols="12">
                            <form-wizard
                                @on-complete="onComplete"
                                title=''
                                subtitle=''
                                color="#20a0ff"
                                error-color="#ff4949"
                                :reset="setIndex"
                                shape="circle"
                                ref="loan_form"

                            >
                                <tab-content :title="$t('borrower')" :before-change="validateFirstStep">
                                    <b-row class="justify-content-md-center">
                                        <!--first_name-->
                                        <b-col sm="12" md="12" xl="3">
                                            <b-form-group
                                                :invalid-feedback="veeErrors.first('borrower_form.first_name')"
                                                :label="$t('first_name') + ' *'"
                                                label-class="control-label"
                                                class="text-left"
                                            >
                                                <b-form-input
                                                    autocomplete="off"
                                                    v-model="form.borrower_first_name"
                                                    v-validate="'required|max:20'"
                                                    :state="veeErrors.has('borrower_form.first_name') ? false : null"
                                                    data-vv-name="first_name"
                                                    :data-vv-as="$t('first_name')"
                                                    data-vv-scope="borrower_form"
                                                    type="text"
                                                    :placeholder="$t('first_name')"
                                                ></b-form-input>
                                            </b-form-group>
                                        </b-col>
                                        <!--last_name-->
                                        <b-col sm="12" md="12" xl="3">
                                            <b-form-group
                                                :invalid-feedback="veeErrors.first('borrower_form.last_name')"
                                                :label="$t('last_name') + ' *'"
                                                label-class="control-label"
                                                class="text-left"
                                            >
                                                <b-form-input
                                                    autocomplete="off"
                                                    v-model="form.borrower_last_name"
                                                    v-validate="'required|max:20'"
                                                    :state="veeErrors.has('borrower_form.last_name') ? false : null"
                                                    data-vv-name="last_name"
                                                    :data-vv-as="$t('last_name')"
                                                    data-vv-scope="borrower_form"
                                                    type="text"
                                                    :placeholder="$t('last_name')"
                                                ></b-form-input>
                                            </b-form-group>
                                        </b-col>
                                    </b-row>
                                    <b-row class="justify-content-md-center">
                                        <!--gender-->
                                        <b-col sm="12" md="12" xl="3">
                                            <b-form-group
                                                :label="$t('gender')"
                                                label-class="control-label"
                                                class="text-left"
                                            >
                                                <b-select
                                                    v-model="form.borrower_gender"
                                                >
                                                    <b-form-select-option value="1">{{ $t('male') }}</b-form-select-option>
                                                    <b-form-select-option value="2">{{ $t('female') }}</b-form-select-option>
                                                </b-select>
                                            </b-form-group>
                                        </b-col>
                                        <!--dob-->
                                        <b-col sm="12" md="12" xl="3">
                                            <b-form-group
                                                :invalid-feedback="veeErrors.first('borrower_form.dob')"
                                                :label="$t('dob')+ ' *'"
                                                label-class="control-label"
                                                class="text-left"
                                            >
                                                <b-form-input
                                                    autocomplete="off"
                                                    v-model="form.borrower_dob"
                                                    v-validate="'required|max:20'"
                                                    :state="veeErrors.has('borrower_form.dob') ? false : null"
                                                    data-vv-name="dob"
                                                    :data-vv-as="$t('dob')"
                                                    data-vv-scope="borrower_form"
                                                    type="date"
                                                    :placeholder="$t('dob')"
                                                    @keydown.enter.prevent="onSubmit"
                                                ></b-form-input>
                                            </b-form-group>
                                        </b-col>
                                    </b-row>
                                    <b-row class="justify-content-md-center">
                                        <!--email-->
                                        <b-col sm="12" md="12" xl="3">
                                            <b-form-group
                                                :invalid-feedback="veeErrors.first('borrower_from.email')"
                                                :label="$t('email')  + ' *'"
                                                label-class="control-label"
                                                class="text-left"
                                            >
                                                <b-form-input
                                                    autocomplete="off"
                                                    v-model="form.borrower_email"
                                                    v-validate="'required|email'"
                                                    :state="veeErrors.has('borrower_form.email') ? false : null"
                                                    data-vv-name="email"
                                                    :data-vv-as="$t('email')"
                                                    data-vv-scope="borrower_form"
                                                    type="email"
                                                    :placeholder="$t('email')"
                                                ></b-form-input>
                                            </b-form-group>
                                        </b-col>
                                        <!--business_name-->
                                        <b-col sm="12" md="12" xl="3">
                                            <b-form-group
                                            :invalid-feedback="veeErrors.first('borrower_form.business_name')"
                                            :label="$t('business_name') + ' *'"
                                            label-class="control-label"
                                            class="text-left"
                                        >
                                            <b-form-input
                                                autocomplete="off"
                                                v-model="form.borrower_business_name"
                                                v-validate="'required|max:20'"
                                                :state="veeErrors.has('borrower_form.business_name') ? false : null"
                                                data-vv-name="business_name"
                                                :data-vv-as="$t('business_name')"
                                                data-vv-scope="borrower_form"
                                                type="text"
                                                :placeholder="$t('business_name')"
                                            ></b-form-input>
                                        </b-form-group>
                                        </b-col>
                                    </b-row>
                                    <b-row class="justify-content-md-center">
                                        <!--phone-->
                                        <b-col sm="12" md="12" xl="3">
                                            <b-form-group
                                                :invalid-feedback="veeErrors.first('borrower_form.phone')"
                                                :label="$t('phone')  + ' *'"
                                                label-class="control-label"
                                                class="text-left"
                                            >
                                                <b-form-input
                                                    autocomplete="off"
                                                    v-model="form.borrower_phone"
                                                    v-validate="'required|max:20'"
                                                    :state="veeErrors.has('borrower_form.phone') ? false : null"
                                                    data-vv-name="phone"
                                                    :data-vv-as="$t('phone')"
                                                    data-vv-scope="borrower_form"
                                                    type="text"
                                                    :placeholder="$t('phone')"
                                                ></b-form-input>
                                            </b-form-group>
                                        </b-col>
                                        <!--alt_phone-->
                                        <b-col sm="12" md="12" xl="3">
                                            <b-form-group
                                                :invalid-feedback="veeErrors.first('borrower_form.alt_phone')"
                                                :label="$t('alt_phone')  + ' *'"
                                                label-class="control-label"
                                                class="text-left"
                                            >
                                                <b-form-input
                                                    autocomplete="off"
                                                    v-model="form.borrower_alt_phone"
                                                    v-validate="'required|max:20'"
                                                    :state="veeErrors.has('borrower_form.alt_phone') ? false : null"
                                                    data-vv-name="alt_phone"
                                                    :data-vv-as="$t('alt_phone')"
                                                    data-vv-scope="borrower_form"
                                                    type="text"
                                                    :placeholder="$t('alt_phone')"
                                                ></b-form-input>
                                            </b-form-group>
                                        </b-col>
                                    </b-row>
                                    <b-row class="justify-content-md-center">
                                        <!--address-->
                                        <b-col sm="12" md="12" xl="6">
                                            <b-form-group
                                                :invalid-feedback="veeErrors.first('borrower_form.address')"
                                                :label="$t('address') + ' *'"
                                                label-class="control-label"
                                                class="text-left"
                                            >
                                                <b-textarea
                                                    autocomplete="off"
                                                    v-model="form.borrower_address"
                                                    v-validate="'required'"
                                                    :state="veeErrors.has('borrower_form.address') ? false : null"
                                                    data-vv-name="address"
                                                    :data-vv-as="$t('address')"
                                                    data-vv-scope="borrower_form"
                                                    rows="4"
                                                    :placeholder="$t('address')"
                                                ></b-textarea>
                                            </b-form-group>
                                        </b-col>
                                    </b-row>
                                    <b-row class="justify-content-md-center">
                                        <b-col sm="12" md="12" xl="6">
                                            <b-button @click="openModalBorrowerUpload">
                                                <span>
                                                    <i class="fas fa-file-upload"></i>
                                                    Upload Required Document *
                                                </span>
                                            </b-button>
                                        </b-col>
                                    </b-row>
                                </tab-content>

                                <tab-content :title="$t('guarantor')" :before-change="validateSecondStep">
                                    <b-row class="justify-content-md-center">
                                        <!--first_name-->
                                        <b-col sm="12" md="12" xl="3">
                                            <b-form-group
                                                :invalid-feedback="veeErrors.first('guarantor_form.first_name')"
                                                :label="$t('first_name') + ' *'"
                                                label-class="control-label"
                                                class="text-left"
                                            >
                                                <b-form-input
                                                    autocomplete="off"
                                                    v-model="form.guarantor_first_name"
                                                    v-validate="'required|max:20'"
                                                    :state="veeErrors.has('guarantor_form.first_name') ? false : null"
                                                    data-vv-name="first_name"
                                                    :data-vv-as="$t('first_name')"
                                                    data-vv-scope="guarantor_form"
                                                    type="text"
                                                    :placeholder="$t('first_name')"
                                                ></b-form-input>
                                            </b-form-group>
                                        </b-col>
                                        <!--last_name-->
                                        <b-col sm="12" md="12" xl="3">
                                            <b-form-group
                                                :invalid-feedback="veeErrors.first('guarantor_form.last_name')"
                                                :label="$t('last_name') + ' *'"
                                                label-class="control-label"
                                                class="text-left"
                                            >
                                                <b-form-input
                                                    autocomplete="off"
                                                    v-model="form.guarantor_last_name"
                                                    v-validate="'required|max:20'"
                                                    :state="veeErrors.has('guarantor_form.last_name') ? false : null"
                                                    data-vv-name="last_name"
                                                    :data-vv-as="$t('last_name')"
                                                    data-vv-scope="guarantor_form"
                                                    type="text"
                                                    :placeholder="$t('last_name')"
                                                ></b-form-input>
                                            </b-form-group>
                                        </b-col>
                                    </b-row>
                                    <b-row class="justify-content-md-center">
                                        <!--gender-->
                                        <b-col sm="12" md="12" xl="3">
                                            <b-form-group
                                                :label="$t('gender')"
                                                label-class="control-label"
                                                class="text-left"
                                            >
                                                <b-select
                                                    v-model="form.guarantor_gender"
                                                >
                                                    <b-form-select-option value="1">{{ $t('male') }}</b-form-select-option>
                                                    <b-form-select-option value="2">{{ $t('female') }}</b-form-select-option>
                                                </b-select>
                                            </b-form-group>
                                        </b-col>
                                        <!--dob-->
                                        <b-col sm="12" md="12" xl="3">
                                            <b-form-group
                                                :invalid-feedback="veeErrors.first('guarantor_form.dob')"
                                                :label="$t('dob')+ ' *'"
                                                label-class="control-label"
                                                class="text-left"
                                            >
                                                <b-form-input
                                                    autocomplete="off"
                                                    v-model="form.guarantor_dob"
                                                    v-validate="'required|max:20'"
                                                    :state="veeErrors.has('guarantor_form.dob') ? false : null"
                                                    data-vv-name="dob"
                                                    :data-vv-as="$t('dob')"
                                                    data-vv-scope="guarantor_form"
                                                    type="date"
                                                    :placeholder="$t('dob')"
                                                    @keydown.enter.prevent="onSubmit"
                                                ></b-form-input>
                                            </b-form-group>
                                        </b-col>
                                    </b-row>
                                    <b-row class="justify-content-md-center">
                                        <!--email-->
                                        <b-col sm="12" md="12" xl="3">
                                            <b-form-group
                                                :invalid-feedback="veeErrors.first('guarantor_from.email')"
                                                :label="$t('email')  + ' *'"
                                                label-class="control-label"
                                                class="text-left"
                                            >
                                                <b-form-input
                                                    autocomplete="off"
                                                    v-model="form.guarantor_email"
                                                    v-validate="'required|email'"
                                                    :state="veeErrors.has('guarantor_form.email') ? false : null"
                                                    data-vv-name="email"
                                                    :data-vv-as="$t('email')"
                                                    data-vv-scope="guarantor_form"
                                                    type="email"
                                                    :placeholder="$t('email')"
                                                ></b-form-input>
                                            </b-form-group>
                                        </b-col>
                                        <!--business_name-->
                                        <b-col sm="12" md="12" xl="3">
                                            <b-form-group
                                            :invalid-feedback="veeErrors.first('guarantor_form.business_name')"
                                            :label="$t('business_name') + ' *'"
                                            label-class="control-label"
                                            class="text-left"
                                        >
                                            <b-form-input
                                                autocomplete="off"
                                                v-model="form.guarantor_business_name"
                                                v-validate="'required|max:20'"
                                                :state="veeErrors.has('guarantor_form.business_name') ? false : null"
                                                data-vv-name="business_name"
                                                :data-vv-as="$t('business_name')"
                                                data-vv-scope="guarantor_form"
                                                type="text"
                                                :placeholder="$t('business_name')"
                                            ></b-form-input>
                                        </b-form-group>
                                        </b-col>
                                    </b-row>
                                    <b-row class="justify-content-md-center">
                                        <!--phone-->
                                        <b-col sm="12" md="12" xl="3">
                                            <b-form-group
                                                :invalid-feedback="veeErrors.first('guarantor_form.phone')"
                                                :label="$t('phone')  + ' *'"
                                                label-class="control-label"
                                                class="text-left"
                                            >
                                                <b-form-input
                                                    autocomplete="off"
                                                    v-model="form.guarantor_phone"
                                                    v-validate="'required|max:20'"
                                                    :state="veeErrors.has('guarantor_form.phone') ? false : null"
                                                    data-vv-name="phone"
                                                    :data-vv-as="$t('phone')"
                                                    data-vv-scope="guarantor_form"
                                                    type="text"
                                                    :placeholder="$t('phone')"
                                                ></b-form-input>
                                            </b-form-group>
                                        </b-col>
                                        <!--alt_phone-->
                                        <b-col sm="12" md="12" xl="3">
                                            <b-form-group
                                                :invalid-feedback="veeErrors.first('guarantor_form.alt_phone')"
                                                :label="$t('alt_phone')  + ' *'"
                                                label-class="control-label"
                                                class="text-left"
                                            >
                                                <b-form-input
                                                    autocomplete="off"
                                                    v-model="form.guarantor_alt_phone"
                                                    v-validate="'required|max:20'"
                                                    :state="veeErrors.has('guarantor_form.alt_phone') ? false : null"
                                                    data-vv-name="alt_phone"
                                                    :data-vv-as="$t('alt_phone')"
                                                    data-vv-scope="guarantor_form"
                                                    type="text"
                                                    :placeholder="$t('alt_phone')"
                                                ></b-form-input>
                                            </b-form-group>
                                        </b-col>
                                    </b-row>
                                    <b-row class="justify-content-md-center">
                                        <!--address-->
                                        <b-col sm="12" md="12" xl="6">
                                            <b-form-group
                                                :invalid-feedback="veeErrors.first('guarantor_form.address')"
                                                :label="$t('address') + ' *'"
                                                label-class="control-label"
                                                class="text-left"
                                            >
                                                <b-textarea
                                                    autocomplete="off"
                                                    v-model="form.guarantor_address"
                                                    v-validate="'required'"
                                                    :state="veeErrors.has('guarantor_form.address') ? false : null"
                                                    data-vv-name="address"
                                                    :data-vv-as="$t('address')"
                                                    data-vv-scope="guarantor_form"
                                                    rows="4"
                                                    :placeholder="$t('address')"
                                                ></b-textarea>
                                            </b-form-group>
                                        </b-col>
                                    </b-row>
                                    <b-row class="justify-content-md-center">
                                        <b-col sm="12" md="12" xl="6">
                                            <b-button variant="success" @click="openModalGuarantorUpload">
                                                <span>
                                                    <i class="fas fa-file-upload"></i>
                                                    Upload Required Document *
                                                </span>
                                            </b-button>
                                        </b-col>
                                    </b-row>
                                </tab-content>

                                <tab-content :title="$t('loan')">

                                </tab-content>

                            </form-wizard>
                        </b-col>
                    </b-card-body>

                </b-card>
            </b-col>
        </b-card-body>
        <div v-if="modalBorrowerUploadShow">
            <modal-upload-borrower
                :modalType="modalBorrowerUploadShowType"
                @closeModal="closeModalBorrowerUpload"
            ></modal-upload-borrower>
        </div>
        <div v-if="modalGuarantorUploadShow">
            <modal-upload-guarantor
                :modalType="modalGuarantorUploadShowType"
                @closeModal="closeModalGuarantorUpload"
            ></modal-upload-guarantor>
        </div>
    </div>
</template>
<script>
import headerPage from '../components/header'
export default {
    components: {
        headerPage,
        ModalUploadBorrower: () => import('./components/ModalUploadBorrower'),
        ModalUploadGuarantor: () => import('./components/ModalUploadGuarantor'),
    },
    data() {
        return {
            form: {
                borrower_first_name: null,
                borrower_last_name: null,
                borrower_gender: 1,
                borrower_dob: null,
                borrower_email: null,
                borrower_business_name: null,
                borrower_phone: null,
                borrower_alt_phone: null,
                borrower_address: null,
                borrower_photo: null,
                borrower_national_photo: null,
                borrower_salary_invoice: null,
                borrower_mortgage: null,
                borrower_family_book: null,

                guarantor_first_name: null,
                guarantor_last_name: null,
                guarantor_gender: 1,
                guarantor_dob: null,
                guarantor_email: null,
                guarantor_business_name: null,
                guarantor_phone: null,
                guarantor_alt_phone: null,
                guarantor_address: null,
                guarantor_photo: null,
                guarantor_national_photo: null,
                guarantor_salary_invoice: null,
                guarantor_mortgage: null,
            },
            setIndex: false,
            modalBorrowerUploadShow: false,
            modalBorrowerUploadShowType: 0,
            modalGuarantorUploadShow: false,
            modalGuarantorUploadShowType: 0,
        }
    },
    methods: {
        openModalBorrowerUpload(){
            this.modalBorrowerUploadShow = true
            this.modalBorrowerUploadShowType = 1
        },
        closeModalBorrowerUpload(data){
            this.modalBorrowerUploadShow = false
            this.modalBorrowerUploadShowType = 0

            if(this.$helpers.nullToVoid(data) != ''){
                this.form.borrower_photo = data.photo
                this.form.borrower_family_book = data.family_book
                this.form.borrower_national_photo = data.national
                this.form.borrower_mortgage = data.mortgage
                this.form.borrower_salary_invoice = data.salary_invoice
            }
        },
        openModalGuarantorUpload(){
            this.modalGuarantorUploadShow = true
            this.modalGuarantorUploadShowType = 1
        },
        closeModalGuarantorUpload(data){
            this.modalGuarantorUploadShow = false
            this.modalGuarantorUploadShowType = 0

            if(this.$helpers.nullToVoid(data) != ''){
                this.form.guarantor_photo = data.photo
                this.form.guarantor_family_book = data.family_book
                this.form.guarantor_national_photo = data.national
                this.form.guarantor_mortgage = data.mortgage
                this.form.guarantor_salary_invoice = data.salary_invoice
            }
        },
        async validateFirstStep() {
            /**
             *  Check form 1 validation
             */
            let checkValidation = false
            await this.$validator.validateAll('borrower_form').then((result) => {
                if (result) {
                    checkValidation = true
                } else {
                    checkValidation = false
                    swal.fire({
                        icon: 'warning',
                        title: this.$t('borrower'),
                        text: this.$t('validation_failed'),
                    })
                }
            })
            return true
        },
        async validateSecondStep() {
            /**
             *  Check form 2 validation
             */
            let checkValidation = false
            await this.$validator.validateAll('guarantor_form').then((result) => {
                if (result) {
                    checkValidation = true
                } else {
                    checkValidation = false
                    swal.fire({
                        icon: 'warning',
                        title: this.$t('guarantor'),
                        text: this.$t('validation_failed'),
                    })
                }
            })
            return true
        },
        onComplete: function () {
            /**
             *  Check form 3 validation
             */
            let checkValidation = false
            this.$validator.validateAll('loan_form').then((result) => {
                if (result) {
                    let input = this.form

                    checkValidation = true

                    let url='/loan/request_loan'

                    axios.post(url, input).then(response => {
                        swal.fire({
                            type: 'success',
                            title: this.$t('request_loan'),
                            text: this.$t('done'),
                            showConfirmButton: false,
                            timer: 2000,
                        })
                        this.clearForm()
                    });

                } else {
                    checkValidation = false
                    swal.fire({
                        icon: 'warning',
                        title: this.$t('loan'),
                        text: this.$t('validation_failed'),
                    })
                }
            })
            return checkValidation
        },
        clearForm(){
            this.form = Object.assign({}, this.defaultForm)

            this.$nextTick(() => {
                this.$validator.reset();
                this.$refs.loan_form.reset()
            });

        }
    }
}
</script>
<style scoped>
.card{
    border-radius: 1.25rem;
}
</style>
