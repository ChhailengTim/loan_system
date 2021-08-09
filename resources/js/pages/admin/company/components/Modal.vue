<template>
    <b-modal
        id="modal"
        v-model="modal"
        scrollable
        centered
        no-close-on-backdrop
        no-close-on-esc
        hide-header-close
        size="lg"
        content-class="custom-modal"
    >
        <template slot="modal-header">
            <h3><i class="fas fa-building"></i> {{ $t('company') }}</h3>
        </template>
            <b-row>
                <!--select image-->
                <b-col cols="3" class="border-lg">
                    <!--image-->
                    <b-col cols="12">
                        <div v-if="$helpers.nullToVoid(form.logo) == ''">
                            <i
                                class="fas fa-image"
                                style="font-size: 150px; color: #a0aec0"
                            ></i>
                        </div>
                        <div v-else>
                            <b-img
                                :src="this.imgUrl + this.form.logo"
                                alt="Logo"
                                width="150"
                                height="150"
                                rounded
                            />
                        </div>
                    </b-col>
                    <b-col cols="12" class="mt-2">
                        <b-button
                            size="sm"
                            class="w-100 ml-2"
                            variant="outline-primary"
                            @click="chooseImage"
                        >{{ $t('choose_file') }}</b-button>
                        <input
                            ref="fileInput"
                            style="display: none"
                            type="file"
                            accept=".png, .jpg"
                            :multiple="false"
                            @change="onFileChange"
                        />
                    </b-col>
                </b-col>
                <!--form-->
                <b-col cols="9">
                    <b-row>
                        <!--name-->
                        <b-col cols="6">
                            <b-form-group
                                :invalid-feedback="veeErrors.first('name')"
                                :label="$t('name') + ' *'"
                                label-class="control-label"
                                class="text-left"
                            >
                                <b-form-input
                                    autocomplete="off"
                                    v-model="form.company_name"
                                    v-validate="'required|max:100'"
                                    :state="veeErrors.has('name') ? false : null"
                                    data-vv-name="name"
                                    :data-vv-as="$t('name')"
                                    type="text"
                                    :placeholder="$t('name')"
                                ></b-form-input>
                            </b-form-group>
                        </b-col>
                        <!--email-->
                        <b-col cols="6">
                            <b-form-group
                                :invalid-feedback="veeErrors.first('email')"
                                :label="$t('email')  + ' *'"
                                label-class="control-label"
                                class="text-left"
                            >
                                <b-form-input
                                    autocomplete="off"
                                    v-model="form.email"
                                    v-validate="'required|email|max:100'"
                                    :state="veeErrors.has('email') ? false : null"
                                    data-vv-name="email"
                                    :data-vv-as="$t('email')"
                                    type="email"
                                    :placeholder="$t('email')"
                                ></b-form-input>
                            </b-form-group>
                        </b-col>
                        <!--phone-->
                        <b-col cols="6">
                            <b-form-group
                                :invalid-feedback="veeErrors.first('phone')"
                                :label="$t('phone')  + ' *'"
                                label-class="control-label"
                                class="text-left"
                            >
                                <b-form-input
                                    autocomplete="off"
                                    v-model="form.phone"
                                    v-validate="'required|min:9|max:10'"
                                    :state="veeErrors.has('phone') ? false : null"
                                    data-vv-name="phone"
                                    :data-vv-as="$t('phone')"
                                    type="text"
                                    :placeholder="$t('phone')"
                                ></b-form-input>
                            </b-form-group>
                        </b-col>
                        <!--alt_phone-->
                        <b-col cols="6">
                            <b-form-group
                                :invalid-feedback="veeErrors.first('alt_phone')"
                                :label="$t('alt_phone')  + ' *'"
                                label-class="control-label"
                                class="text-left"
                            >
                                <b-form-input
                                    autocomplete="off"
                                    v-model="form.alt_phone"
                                    v-validate="'required|min:9|max:10'"
                                    :state="veeErrors.has('alt_phone') ? false : null"
                                    data-vv-name="alt_phone"
                                    :data-vv-as="$t('alt_phone')"
                                    type="text"
                                    :placeholder="$t('alt_phone')"
                                ></b-form-input>
                            </b-form-group>
                        </b-col>
                        <!--address-->
                        <b-col cols="12">
                            <b-form-group
                                :invalid-feedback="veeErrors.first('address')"
                                :label="$t('address')"
                                label-class="control-label"
                                class="text-left"
                            >
                                <b-textarea
                                    autocomplete="off"
                                    v-model="form.address"
                                    v-validate="'max:200'"
                                    :state="veeErrors.has('address') ? false : null"
                                    data-vv-name="address"
                                    :data-vv-as="$t('address')"
                                    rows="5"
                                    :placeholder="$t('address')"
                                ></b-textarea>
                            </b-form-group>
                        </b-col>
                    </b-row>
                    <b-row class="mt-1 mb-1">
                        <b-col>
                            <h5 style="cursor: pointer" @click="addInterest">
                                <i :class="'fas fa-plus-square'"></i>
                                <span>Add Interest</span>
                            </h5>
                        </b-col>
                    </b-row>
                    <b-row v-for="(obj, index) in form.company_interest" :key="index">
                        <!--month-->
                        <b-col cols="12" sm="12" md="6" xl="6">
                            <b-form-group
                                :state="veeErrors.has('month_'+index) ? false : null"
                                :invalid-feedback="veeErrors.first('month_'+index)"
                                :label="$t('month') + ' *'"
                                label-class="control-label"
                                class="text-left"
                            >
                                <b-input-group :append="$t('month')">
                                    <b-form-input
                                        autocomplete="off"
                                        v-model="obj.month"
                                        v-validate="'required|numeric'"
                                        :state="veeErrors.has('month_'+index) ? false : null"
                                        :data-vv-name="'month_'+index"
                                        :data-vv-as="$t('month')"
                                        type="number"
                                        min="1"
                                        :placeholder="$t('month')"
                                    ></b-form-input>
                                </b-input-group>
                            </b-form-group>
                        </b-col>
                         <!--interest-->
                        <b-col cols="12" sm="12" md="6" xl="6">
                            <b-form-group
                                :state="veeErrors.has('interest_'+index) ? false : null"
                                :invalid-feedback="veeErrors.first('interest_'+index)"
                                :label="$t('interest') + ' *'"
                                label-class="control-label"
                                class="text-left"
                            >
                                <b-input-group prepend="%">
                                    <b-form-input
                                        autocomplete="off"
                                        v-model="obj.interest"
                                        v-validate="'required'"
                                        :state="veeErrors.has('interest_'+index) ? false : null"
                                        :data-vv-name="'interest_'+index"
                                        :data-vv-as="$t('interest')"
                                        min="1"
                                        type="number"
                                        :placeholder="$t('interest')"
                                        @keydown.enter.prevent="onSubmit"
                                    ></b-form-input>
                                    <template #append>
                                        <i
                                            class="fas fa-trash-alt text-danger ml-3"
                                            style="cursor: pointer; margin-top: 9px; font-size: 20px;"
                                            @click="removeInterest(index)"
                                        ></i>
                                    </template>
                                </b-input-group>
                            </b-form-group>
                        </b-col>
                    </b-row>
                </b-col>
            </b-row>
            <template slot="modal-footer">
                <b-button variant="outline-danger" @click="clearForm" class="float-right">
                    <i class="fas fa-times-circle mr-1"></i>
                    {{ $t('close') }}</b-button>
                <b-button type="submit" variant="outline-primary" class="float-right ml-2" @click.prevent="onSubmit">
                    <i class="fas fa-save mr-1" v-if="modalType == 1"></i>
                    <i class="fa fa-edit mr-1" v-if="modalType == 2"></i>
                    {{ modalOk }}</b-button>
        </template>
    </b-modal>
</template>

<script>
    import { mapGetters } from 'vuex';
    export default {
        name: "Modal",
        props: {
            formItem: {
                type: Object,
                default: () => {
                    return {}
                },
            },
            modalType: {
                type: Number,
                default: 0,
            },
        },
        data(){
            return{
                modal:true,
                form: {
                    company_name: null,
                    phone: null,
                    alt_phone: null,
                    address: null,
                    logo: null,
                    old_logo: null,
                    company_interest: [{ month: null, interest: null}]
                },
                defaultForm: {
                    company_name: null,
                    phone: null,
                    alt_phone: null,
                    address: null,
                    logo: null,
                    old_logo: null,
                    company_interest: [{ month: null, interest: null}]
                },
                url: null,
                imgUrl: '/images/company/',
                listItems: {}
            }
        },
        computed: {
            modalOk() {
                return this.modalType == 1 ? this.$t('save')
                : (this.modalType == 2 ? this.$t('update')
                : `${this.$t('wait')}...`)
            },
        },
        watch: {
            modalType: {
                handler(val) {
                    if (val == 1){
                        this.modal = true;
                        this.url = '/company/store';
                    }else if (val == 2){
                        this.modal = true;
                        this.setData();
                        this.url = '/company/edit';
                    }
                },
                immediate: true,
            },
        },
        created(){
        },
        methods:{
            onSubmit() {
                let vm = this;
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        if(this.$helpers.nullToVoid(this.form.logo) == ''){
                            swal.fire({
                                icon: 'warning',
                                title: vm.$t('company'),
                                text: this.$i18n.locale == 'en' ? 'Please choose logo !' : (this.$i18n.locale == 'kh' ? 'សូមជ្រើសរើសឡូហ្គូ !' : ''),
                            })
                            return;
                        }

                        axios.post(this.url, this.form).then(function (response) {
                            if (response.status === 200){
                                vm.listItems = response.data.data
                                vm.clearForm()

                                vm.$notify({
                                    group: 'message',
                                    type: 'success',
                                    title: vm.$t('company'),
                                    text: vm.$t('done_action')
                                });
                            }
                        }).catch(function (error) {
                            console.log(error)
                        });
                    }else{
                        vm.$notify({
                            group: 'message',
                            type: 'warning',
                            title: vm.$t('company'),
                            text: vm.$t('validation_failed')
                        });
                    }
                });
            },
            clearForm() {
                this.form = Object.assign({}, this.defaultForm)

                this.$nextTick(() => {
                    this.$validator.reset();
                });

                this.$emit('closeModal', this.listItems);
                this.modal = false
                this.listItems = {}
            },
            setData() {
                this.form = Object.assign({}, this.formItem)
                this.form.old_logo = this.formItem.logo
            },
            chooseImage() {
                this.$refs.fileInput.click()
            },
            onFileChange($event) {
                let vm = this
                const files = $event.target.files || $event.dataTransfer.files
                if (files[0]) {
                    if (files[0].size > 2 * 1024 * 1024) {
                        vm.form.logo = 'https://placekitten.com/380/200'
                        return
                    }
                    var reader = new FileReader()
                    reader.onload = function (e) {
                        vm.form.logo = '';
                        vm.imgUrl = '';
                        vm.form.logo = e.target.result
                    }
                    reader.readAsDataURL(files[0])
                } else {
                    vm.form.logo = 'https://placekitten.com/380/200'
                }
            },
            addInterest(){
                this.form.company_interest.push({
                    id: null,
                    month: null,
                    interest: null,
                })
            },
            removeInterest(index){
                if(this.form.company_interest.length > 1){
                    this.$delete(this.form.company_interest, index)
                }
            },
        }
    }
</script>

<style scoped>
/deep/ .custom-modal{
    border-radius: 15px;
}
</style>
