<template>
    <b-modal
        v-model="modalShow"
        scrollable
        centered
        no-close-on-backdrop
        no-close-on-esc
        hide-header-close
        size="md"
        content-class="custom-modal"
    >
        <template slot="modal-header">
            <h3><i class="fas fa-user-lock"></i> {{ $t('borrower_login') }}</h3>
        </template>
        <div class="d-block" >
            <b-row>
                <!--email-->
                <b-col cols="12">
                    <b-form-group
                        :invalid-feedback="veeErrors.first('email')"
                        :label="$t('email') + ' *'"
                        label-class="control-label"
                        class="text-left"
                    >
                        <b-form-input
                            autocomplete="off"
                            v-model="form.email"
                            v-validate="'required|email|max:200'"
                            :state="veeErrors.has('email') ? false : null"
                            data-vv-name="email"
                            :data-vv-as="$t('email')"
                            type="email"
                            :placeholder="$t('email')"
                            @keydown.enter.prevent="onSubmitBorrowerLogin"
                        ></b-form-input>
                    </b-form-group>
                </b-col>
                <!--password-->
                <b-col cols="12">
                    <b-form-group
                        :invalid-feedback="veeErrors.first('password')"
                        :label="$t('password') + ' *'"
                        label-class="control-label"
                        class="text-left"
                    >
                        <b-form-input
                            autocomplete="off"
                            v-model="form.password"
                            v-validate="'required|min:6|max:191'"
                            :state="veeErrors.has('password') ? false : null"
                            data-vv-name="password"
                            :data-vv-as="$t('password')"
                            :type="showPassword ? 'text' : 'password'"
                            :placeholder="$t('password')"
                            @keydown.enter.prevent="onSubmitBorrowerLogin"
                        ></b-form-input>
                    </b-form-group>
                    <b-form-checkbox name="check-button" switch @change="onSwitchShowPassword" id="switchPassword">
                        <label v-if="$i18n.locale == 'en'" for="switchPassword">Show Password</label>
                        <label v-if="$i18n.locale == 'kh'" for="switchPassword">បង្ហាញលេខសម្ងាត់</label>
                    </b-form-checkbox>
                </b-col>
            </b-row>
        </div>
        <template slot="modal-footer">
            <b-button variant="outline-danger" @click="clearForm" class="float-right">
                <i class="fas fa-times-circle mr-1"></i>
                {{ $t('close') }}</b-button>
            <b-button type="submit" variant="outline-primary" class="float-right ml-2" @click.prevent="onSubmitBorrowerLogin">
                <i class="fas fa-save mr-1" ></i>
                {{ $t('login') }}</b-button>
        </template>
    </b-modal>
</template>
<script>
import store from '../../../store'
export default {
    props: {
        modalType: {
            type: Number,
            default: () => {
                return 0
            }
        }
    },
    data(){
        return{
            modalShow: false,
            form: {
                email: 'sotthipornfree@gmail.com',
                password: 123456
            },
            defaultForm: {
                email: 'sotthipornfree@gmail.com',
                password: 123456
            },
            showPassword: false
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
        onSubmitBorrowerLogin(){
            let vm = this

            this.$validator.validateAll().then((result) => {
                if (result) {
                    let url='/loan/borrower_login'

                    let input = this.form

                    axios.post(url, input).then(response => {
                        if(response.data.success == 1){
                            store.dispatch('fetchBorrower', response.data.data)

                            this.clearForm()

                            vm.$notify({
                                group: 'message',
                                type: 'success',
                                title: vm.$t('borrower_login'),
                                text: vm.$t('done_action')
                            });

                              window.location.href = '/front/borrower_review'
                        }else{

                            vm.$notify({
                                group: 'message',
                                type: 'warning',
                                title: vm.$t('borrower'),
                                text: vm.$t('invalid_login')
                            });

                            store.dispatch('fetchBorrower', {})

                            return;
                        }

                    }).catch(function (error) {
                        console.log(error)
                    });

                } else {
                   vm.$notify({
                        group: 'message',
                        type: 'warning',
                        title: vm.$t('borrower_login'),
                        text: vm.$t('validation_failed')
                    });
                }
            })
        },
        clearForm(){
            this.form = Object.assign({}, this.defaultForm)

            this.$nextTick(() => {
                this.$validator.reset();
            });

            this.$emit('closeModal')

            this.modalShow = false;

        },
        onSwitchShowPassword(){
            this.showPassword = !this.showPassword
        }
    }
}
</script>
<style scoped>
/deep/ .custom-modal{
    border-radius: 15px;
}
</style>
