<template>
<div>
    <!--  BEGIN NAVBAR  -->
    <topnav />
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        <sidebar />
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content" style="margin-top: 125px;">
            <div class="layout-px-spacing">
                <div class="row layout-top-spacing">
                    <div class="col-12 layout-spacing">
                        <div>
                            <router-view></router-view>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-wrapper">
                <div class="footer-section f-section-1">
                    <p class="">{{ $t('copy_right') }} © 2021 <a target="_blank" href="#">Group 3</a>, {{ $t('all_rights_reserved') }}</p>
                </div>
                <div class="footer-section f-section-2">
                    <p class="">Database System Assignment <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></p>
                </div>
            </div>
        </div>
        <!--  END CONTENT PART  -->
    </div>
    <!-- END MAIN CONTAINER -->
</div>
</template>
<script>
import Topnav from '../components/navs/Topnav'
import Sidebar from '../components/navs/Sidebar'
export default {
    name: 'app',
    head() {
        return {}
    },
    components: {
        Topnav,
        Sidebar
    },
    created(){
    },
}
</script>
<style scoped>
/deep/ .card-table {
    box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;
    border-radius: 20px;
    overflow: hidden;
    border: none;
}
/deep/ .footer-wrapper{
    margin-top: -15px;
}
/deep/ .apexcharts-menu{
    min-width: 113px;
}
/deep/ .menu .router-link-active{
    background: #bfc9d4;
    box-shadow: 0 1px 3px 0 rgb(0 0 0 / 10%), 0 1px 2px 0 rgb(0 0 0 / 6%);
    border-radius: 6px;
    color: rgb(54, 52, 52) !important;
}
</style>
