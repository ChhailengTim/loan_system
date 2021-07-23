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
            <h3><i class="fas fa-people-carry"></i> {{ $t('borrower_login') }}</h3>
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
                            v-validate="'required|max:191'"
                            :state="veeErrors.has('email') ? false : null"
                            data-vv-name="email"
                            :data-vv-as="$t('email')"
                            type="text"
                            :placeholder="$t('email')"
                            @keydown.enter.prevent="onSubmit"
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
                            v-validate="'required|max:191'"
                            :state="veeErrors.has('password') ? false : null"
                            data-vv-name="password"
                            :data-vv-as="$t('password')"
                            type="text"
                            :placeholder="$t('password')"
                            @keydown.enter.prevent="onSubmit"
                        ></b-form-input>
                    </b-form-group>
                </b-col>
            </b-row>
        </div>
        <template slot="modal-footer">
            <b-button variant="outline-danger" @click="closeModalBorrwerLogin" class="float-right">
                <i class="fas fa-times-circle mr-1"></i>
                {{ $t('close') }}</b-button>
            <b-button type="submit" variant="outline-primary" class="float-right ml-2" @click.prevent="onSubmitBorrowerLogin">
                <i class="fas fa-save mr-1" ></i>
                Login</b-button>
        </template>
    </b-modal>
</template>
<script>
export default {
    props: {
        modalShow: false
    },
    data(){
        return{
            modalBorrowerShow: false,
            form: {}
        }
    },
    methods: {
        openModalBorrwerLogin(){
            this.modalBorrowerShow = true;
        },
        closeModalBorrwerLogin(){
            this.modalBorrowerShow = false;
        },
        onSubmitBorrowerLogin(){
            window.location.href = '/front/borrower_review'
        }
    }
}
</script>
<style scoped>
/deep/ .custom-modal{
    border-radius: 15px;
}
</style>
