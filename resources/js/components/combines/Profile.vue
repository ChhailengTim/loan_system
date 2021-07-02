<template>
    <b-modal
        id="modal"
        v-model="modal"
        hide-footer
        hide-header
        scrollable
        centered
        no-close-on-backdrop
        no-close-on-esc
        hide-header-close
        title="My Profile"
        >
         <div class="user-profile layout-spacing">
            <div class="widget-content widget-content-area">
                <b-row>
                    <b-col cols="10">
                        <h3>{{ $t('profile') }}</h3>
                    </b-col>
                    <b-col style="margin-left: 18px;">
                        <span class="close-profile text-white" style="cursor: pointer;" @click="closeModal">
                            <i class="fas fa-times-circle" style="margin-top: 11px; margin-left: 2px;"></i>
                        </span>
                    </b-col>
                </b-row>
                <div class="text-center user-info mt-2">
                    <img src="/assets/img/90x90.jpg" alt="avatar">
                    <p class="">Admin</p>
                </div>
                <div class="user-info-list">

                    <div class="">
                        <ul class="contacts-block list-unstyled">
                            <li class="contacts-block__item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-coffee"><path d="M18 8h1a4 4 0 0 1 0 8h-1"></path><path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"></path><line x1="6" y1="1" x2="6" y2="4"></line><line x1="10" y1="1" x2="10" y2="4"></line><line x1="14" y1="1" x2="14" y2="4"></line></svg>
                                <span>Staff</span>
                            </li>
                            <li class="contacts-block__item mt-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                <span>Jan 20, 1989</span>
                            </li>
                            <li class="contacts-block__item mt-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                <span>Phnom Penh</span>
                            </li>
                            <li class="contacts-block__item mt-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                <span>admin@gmail.com</span>
                            </li>
                            <li class="contacts-block__item mt-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                                <span>+855 968605854</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </b-modal>
</template>

<script>
    import { mapGetters } from 'vuex';
    export default {
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
                modal: false,
                url: null,
            }
        },
        watch: {
            modalType: {
                handler(val) {
                    if (val == 1){
                        this.modal = true;
                    }else if (val == 2){
                        this.modal = true;
                    }
                },
                immediate: true,
            },
        },
        created(){
        },
        methods:{
            closeModal(){
                this.modal = false
                this.$emit('closeModal',this.modal);
            }
        }
    }
</script>

<style scoped>
/deep/ .modal-dialog-centered.modal-dialog-scrollable .modal-content{
    border-radius: 43px;
}
.widget-content-area {
  /* -webkit-box-shadow: 0 4px 6px 0 rgba(63, 60, 60, 0.09), 0 1px 20px 0 rgba(0, 0, 0, 0.08), 0px 1px 11px 0px rgba(0, 0, 0, 0.06);
  -moz-box-shadow: 0 4px 6px 0 rgba(85, 85, 85, 0.0901961), 0 1px 20px 0 rgba(0, 0, 0, 0.08), 0px 1px 11px 0px rgba(0, 0, 0, 0.06);
  box-shadow: 0 4px 6px 0 rgba(66, 66, 66, 0.09), 0 1px 20px 0 rgba(0, 0, 0, 0.08), 0px 1px 11px 0px rgba(0, 0, 0, 0.06); */
  }
.layout-spacing {
 padding-bottom: 25px; }

 .user-profile .widget-content-are{
 border-radius: 35px; }
  .user-profile .widget-content-area .edit-profile {
   height: 35px;
    width: 35px;
    display: flex;
    justify-content: center;
    align-self: center;
    background-color: #1b55e2;
    background: linear-gradient(to right, #0081ff 0%, #0045ff 100%);
    border-radius: 50%;
    box-shadow: 0 10px 15px rgba(0, 69, 255, 0.2); }
    .user-profile .widget-content-area .close-profile {
   height: 35px;
    width: 35px;
    display: flex;
    justify-content: center;
    align-self: center;
    background-color: #d9534f;
    background: linear-gradient(to right, #bb4673 0%, #cf5cb6 100%);
    border-radius: 50%;
    box-shadow: 0 10px 15px rgba(0, 69, 255, 0.2); }
    .user-profile .widget-content-area .edit-profile svg {
      font-size: 17px;
      vertical-align: middle;
      margin-right: 0;
      color: #fff;
      width: 19px;
      align-self: center; }
  .user-profile .widget-content-area h3 {
    position: relative;
    font-size: 21px;
    font-weight: 600;
    color: #3b3f5c;
    margin: 6px 0px 0 0;
}
    .user-profile .widget-content-area h3:after {
      position: absolute;
      content: "";
      height: 2px;
      width: 55px;
      background: #1b55e2;
      border-radius: 50%;
      bottom: 0;
      left: 15px; }
  .user-profile .widget-content-area .user-info {
    margin-top: 63px; }
    .user-profile .widget-content-area .user-info img {
      border-radius: 9px;
      box-shadow: 0 6px 10px 0 rgba(0, 0, 0, 0.14), 0 1px 18px 0 rgba(0, 0, 0, 0.12), 0 3px 5px -1px rgba(0, 0, 0, 0.2); }
    .user-profile .widget-content-area .user-info p {
      font-size: 20px;
      font-weight: 600;
      margin-top: 22px;
      color: #1b55e2; }
  .user-profile .widget-content-area .user-info-list ul.contacts-block {
    border: none;
    max-width: 217px;
    margin: 36px auto; }
    .user-profile .widget-content-area .user-info-list ul.contacts-block li {
      margin-bottom: 13px;
      font-weight: 600;
      font-size: 13px; }
      .user-profile .widget-content-area .user-info-list ul.contacts-block li a {
        font-weight: 600;
        font-size: 15px;
        color: #1b55e2; }
    .user-profile .widget-content-area .user-info-list ul.contacts-block svg {
      width: 21px;
      margin-right: 15px;
      color: #888ea8;
      vertical-align: middle;
      fill: rgba(0, 23, 55, 0.08); }
    .user-profile .widget-content-area .user-info-list ul.contacts-block li:hover svg {
      color: #1b55e2;
      fill: rgba(27, 85, 226, 0.239216); }
    .user-profile .widget-content-area .user-info-list ul.contacts-block ul.list-inline {
      margin: 27px auto; }
      .user-profile .widget-content-area .user-info-list ul.contacts-block ul.list-inline div.social-icon {
        border: 2px solid #e0e6ed;
        border-radius: 50%;
        height: 35px;
        width: 35px;
        display: flex;
        justify-content: center;
        align-self: center; }
      .user-profile .widget-content-area .user-info-list ul.contacts-block ul.list-inline svg {
        margin-right: 0;
        color: #1b55e2;
        width: 19px;
        align-self: center; }

</style>
