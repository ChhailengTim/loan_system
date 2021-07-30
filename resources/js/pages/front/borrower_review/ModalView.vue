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
                            <b-tab :title="$t('your_info')" active>
                                <b-row>
                                    <b-col>
                                        Company Name
                                    </b-col>
                                </b-row>
                            </b-tab>
                            <b-tab :title="$t('guarantor')">
                            </b-tab>
                        </b-tabs>
                    </b-card>
                </b-col>
            </b-row>
        </div>
        <template slot="modal-footer">
            <b-button variant="outline-danger" @click="clearForm" class="float-right">
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
        onSubmit(){
            let vm = this
        },
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
