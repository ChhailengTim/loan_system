<template>
    <div>
        <div class="header-container fixed-top">
            <header class="header navbar navbar-expand-sm " >

        <ul class="navbar-item theme-brand flex-row  text-center">
            <li class="nav-item theme-logo">
                <a href="index.html">
                    <img src="/assets/img/90x90.jpg" class="navbar-logo" alt="logo">
                </a>
            </li>
            <li class="nav-item theme-text">
                <a href="index.html" class="nav-link text-white"> {{ $t('digital_loan_system') }} </a>
            </li>
        </ul>

        <ul class="navbar-item flex-row ml-md-auto">
            <select-locale />

            <li class="nav-item dropdown user-profile-dropdown">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <img src="/assets/img/90x90.jpg" alt="avatar">
                </a>
                <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                    <div class="">
                       <div class="dropdown-item" style="cursor: pointer;">
                            <a @click="openModalProfile"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> {{ $t('my_profile') }}</a>
                        </div>
                        <div class="dropdown-item">
                            <a class="" href="/logout"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> {{ $t('sign_out') }}</a>
                        </div>
                    </div>
                </div>
            </li>

        </ul>
    </header>
        </div>
        <div class="sub-header-container" style="margin-top: 11px;">
            <header class="header navbar navbar-expand-sm shadow-sm">
                <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>
                <ul class="navbar-nav flex-row">
                    <li>
                        <div class="page-header">

                            <nav class="breadcrumb-one" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item" v-if="this.$helpers.nullToVoid(getRouteName.main) == ''">{{ $t('dashboard') }}</li>
                                    <li class="breadcrumb-item" v-else>{{ $t(this.getRouteName.main) }}</li>
                                    <li v-if="this.$helpers.nullToVoid(getRouteName.sub) != ''" class="breadcrumb-item active" aria-current="page"><span>{{ $t(this.getRouteName.sub) }}</span></li>
                                </ol>
                            </nav>

                        </div>
                    </li>
                </ul>
            </header>
        </div>

         <!--modal-->
        <div v-if="modalProfileShow">
            <profile
                :modalType="modalProfileType"
                @closeModal="closeProfileModal"
            ></profile>
        </div>
        <!--end modal-->
    </div>
</template>
<script>
import SelectLocale from '../combines/SelectLocale'
import Profile from '../combines/Profile'
export default {
    data(){
        return {
            getRouteName: null,
            modalProfileShow: false,
            modalProfileType: 0
        }
    },
    components: {
        SelectLocale,
        Profile,
    },
    watch: {
        $route: {
            handler(val){
                let route = val.path.split('/')

                if(route.length > 2){
                    this.getRouteName = { main: route[1], sub: route[route.length - 1] }
                }else{
                    this.getRouteName = {main: route[1], sub: null}
                }
            },
            immediate: true
        }
    },
    methods: {
        openModalProfile(){
            this.modalProfileShow = true
            this.modalProfileType = 1 //set modal type 1 = save
        },
        closeProfileModal(event){
            this.modalProfileType = 0;
            this.modalProfileShow = false
        },
    }
}
</script>
<style scoped>
.dropdown-item a{
    text-decoration: none;
}
</style>
