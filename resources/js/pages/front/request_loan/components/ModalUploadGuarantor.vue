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
                    <b-col cols="12">
                        <label for="">{{ $t('photo') }}</label>
                        <div v-if="$helpers.nullToVoid(form.photo) == ''">
                            <i
                                class="fas fa-image"
                                style="font-size: 150px; color: #a0aec0"
                            ></i>
                        </div>
                        <div v-else>
                            <b-img
                                :src="this.form.photo"
                                alt="photo"
                                width="150"
                                height="150"
                                rounded
                            />
                        </div>
                    </b-col>
                    <b-col cols="12" class="mt-2">
                        <b-button
                            size="sm"
                            style="width: 145px;"
                            variant="outline-primary"
                            @click="choosePhoto"
                        >{{ $t('choose_file') }}</b-button>
                        <input
                            ref="fileInputPhoto"
                            style="display: none"
                            type="file"
                            accept=".png, .jpg"
                            :multiple="false"
                            @change="onFileChangePhoto"
                        />
                    </b-col>
                </b-col>

                <b-col cols="6" md="3" xl="3">
                    <!--national_id-->
                    <b-col cols="12">
                        <label for="">{{ $t('national_id') }}</label>
                        <div v-if="$helpers.nullToVoid(form.national) == ''">
                            <i
                                class="fas fa-image"
                                style="font-size: 150px; color: #a0aec0"
                            ></i>
                        </div>
                        <div v-else>
                            <b-img
                                :src="this.form.national"
                                alt="national"
                                width="150"
                                height="150"
                                rounded
                            />
                        </div>
                    </b-col>
                    <b-col cols="12" class="mt-2">
                        <b-button
                            size="sm"
                            style="width: 145px;"
                            variant="outline-primary"
                            @click="chooseNational"
                        >{{ $t('choose_file') }}</b-button>
                        <input
                            ref="fileInputNational"
                            style="display: none"
                            type="file"
                            accept=".png, .jpg"
                            :multiple="false"
                            @change="onFileChangeNational"
                        />
                    </b-col>
                </b-col>

                <b-col cols="6" md="3" xl="3">
                    <!--mortgage-->
                    <b-col cols="12">
                        <label for="">{{ $t('mortgage') }}</label>
                        <div v-if="$helpers.nullToVoid(form.mortgage) == ''">
                            <i
                                class="fas fa-image"
                                style="font-size: 150px; color: #a0aec0"
                            ></i>
                        </div>
                        <div v-else>
                            <b-img
                                :src="this.form.mortgage"
                                alt="mortgage"
                                width="150"
                                height="150"
                                rounded
                            />
                        </div>
                    </b-col>
                    <b-col cols="12" class="mt-2">
                        <b-button
                            size="sm"
                            style="width: 145px;"
                            variant="outline-primary"
                            @click="chooseMortgage"
                        >{{ $t('choose_file') }}</b-button>
                        <input
                            ref="fileInputMortgage"
                            style="display: none"
                            type="file"
                            accept=".png, .jpg"
                            :multiple="false"
                            @change="onFileChangeMortgage"
                        />
                    </b-col>
                </b-col>

                <b-col cols="6" md="3" xl="3">
                    <!--salary_invoice-->
                    <b-col cols="12">
                        <label for="">{{ $t('salary_invoice') }}</label>
                        <div v-if="$helpers.nullToVoid(form.salary_invoice) == ''">
                            <i
                                class="fas fa-image"
                                style="font-size: 150px; color: #a0aec0"
                            ></i>
                        </div>
                        <div v-else>
                            <b-img
                                :src="this.form.salary_invoice"
                                alt="salary_invoice"
                                width="150"
                                height="150"
                                rounded
                            />
                        </div>
                    </b-col>
                    <b-col cols="12" class="mt-2">
                        <b-button
                            size="sm"
                            style="width: 145px;"
                            variant="outline-primary"
                            @click="chooseSalaryInvoice"
                        >{{ $t('choose_file') }}</b-button>
                        <input
                            ref="fileInputSalaryInvoice"
                            style="display: none"
                            type="file"
                            accept=".png, .jpg"
                            :multiple="false"
                            @change="onFileChangeSalaryInvoice"
                        />
                    </b-col>
                </b-col>
            </b-row>
        </div>
        <template slot="modal-footer">
            <b-button variant="outline-danger" @click="closeModal" class="float-right">
                <i class="fas fa-times-circle mr-1"></i>
                {{ $t('close') }}</b-button>
            <b-button type="submit" variant="outline-primary" class="float-right ml-2" @click.prevent="save">
                <i class="fas fa-save mr-1" ></i>
                Save</b-button>
        </template>
    </b-modal>
</template>
<script>
export default {
    props: {
        modalType: false
    },
    data(){
        return{
            form: {
                photo: null,
                national: null,
                salary_invoice: null,
                mortgage: null
            },
            defaultForm: {
                photo: null,
                national: null,
                salary_invoice: null,
                mortgage: null
            },
            modal: false,
            listItem: {}
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
        save(){
            let vm = this

            if(this.form.photo == null
                || this.form.national == null
                || this.form.mortgage  == null
                || this.form.salary_invoice  == null
            ){
                 vm.$notify({
                    group: 'message',
                    type: 'warning',
                    title: vm.$t('borrower'),
                    text: vm.$i18n.locale == 'en' ? 'Please upload all required document' :
                    (vm.$i18n.locale == 'kh' ? 'សូមបង្ហោះឯកសារដែលត្រូវការទាំងអស់' : '')
                });
                return;
            }else{
                this.listItem = JSON.parse(JSON.stringify(this.form))
                this.closeModal()
            }
        },
        closeModal(){
            this.form = Object.assign({}, this.defaultForm)

            this.$emit('closeModal', this.listItem)

            this.listItem = {}
            this.modal = false;
        },
        choosePhoto() {
                this.$refs.fileInputPhoto.click()
        },
        onFileChangePhoto($event) {
            let vm = this
            const files = $event.target.files || $event.dataTransfer.files
            if (files[0]) {
                if (files[0].size > 2 * 1024 * 1024) {
                    vm.form.photo = ''
                    return
                }
                var reader = new FileReader()
                reader.onload = function (e) {
                    vm.form.photo = '';
                    vm.form.photo = e.target.result
                }
                reader.readAsDataURL(files[0])
            } else {
                vm.form.photo = ''
            }
        },
        chooseNational() {
                this.$refs.fileInputNational.click()
        },
        onFileChangeNational($event) {
            let vm = this
            const files = $event.target.files || $event.dataTransfer.files
            if (files[0]) {
                if (files[0].size > 2 * 1024 * 1024) {
                    vm.form.national = ''
                    return
                }
                var reader = new FileReader()
                reader.onload = function (e) {
                    vm.form.national = '';
                    vm.form.national = e.target.result
                }
                reader.readAsDataURL(files[0])
            } else {
                vm.form.national = ''
            }
        },
        chooseSalaryInvoice() {
                this.$refs.fileInputSalaryInvoice.click()
        },
        onFileChangeSalaryInvoice($event) {
            let vm = this
            const files = $event.target.files || $event.dataTransfer.files
            if (files[0]) {
                if (files[0].size > 2 * 1024 * 1024) {
                    vm.form.salary_invoice = ''
                    return
                }
                var reader = new FileReader()
                reader.onload = function (e) {
                    vm.form.salary_invoice = '';
                    vm.form.salary_invoice = e.target.result
                }
                reader.readAsDataURL(files[0])
            } else {
                vm.form.salary_invoice = ''
            }
        },
        chooseMortgage() {
                this.$refs.fileInputMortgage.click()
        },
        onFileChangeMortgage($event) {
            let vm = this
            const files = $event.target.files || $event.dataTransfer.files
            if (files[0]) {
                if (files[0].size > 2 * 1024 * 1024) {
                    vm.form.mortgage = ''
                    return
                }
                var reader = new FileReader()
                reader.onload = function (e) {
                    vm.form.mortgage = '';
                    vm.form.mortgage = e.target.result
                }
                reader.readAsDataURL(files[0])
            } else {
                vm.form.mortgage = ''
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
