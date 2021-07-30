<template>
    <div>
        <!-- <b-navbar toggleable="lg" type="dark" variant="dark">
            <b-navbar-brand href="/front/home">Online Loan</b-navbar-brand>

            <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

            <b-collapse id="nav-collapse" is-nav>
            <b-navbar-nav>
                <b-nav-item href="/front/home">Home</b-nav-item>
                <b-nav-item href="javascript:;">Service</b-nav-item>
                <b-nav-item href="javascript:;">About Us</b-nav-item>
                <b-nav-item href="javascript:;">Contact Us</b-nav-item>
                <b-nav-item href="/front/request_loan">
                    Request Loan
                </b-nav-item>
            </b-navbar-nav>

            <b-navbar-nav class="ml-auto">
                <b-nav-form>
                <b-form-input size="sm" class="mr-sm-2" placeholder="Search"></b-form-input>
                <b-button size="sm" class="my-2 my-sm-0">Search</b-button>
                </b-nav-form>

                <b-nav-item-dropdown text="Lang" right>
                <b-dropdown-item href="#">EN</b-dropdown-item>
                <b-dropdown-item href="#">KH</b-dropdown-item>
                </b-nav-item-dropdown>

                <b-nav-item-dropdown right>
                <template #button-content>
                    <em>Login</em>
                </template>
                <b-dropdown-item @click="openModalBorrwerLogin">Borrower</b-dropdown-item>
                <b-dropdown-item href="#">Bank</b-dropdown-item>
                </b-nav-item-dropdown>
            </b-navbar-nav>
            </b-collapse>
        </b-navbar> -->

        <header id="header">
            <nav id="mainNavbar" class="navbar navbar-expand-lg bg-nav fixed-top">
            <a class="navbar-brand" href="/front/home">
            <img src="/logo.png" alt="" width="346" height="39">
            </a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#mainNav">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                <a class="nav-link" href="/front/home">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="javascript:;">Service</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="javascript:;">Team</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="javascript:;">About Us</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="javascript:;">Contact US</a>
                </li>
                <li class="nav-item">
                    <b-nav-item-dropdown right>
                        <template #button-content>
                            <em>Lang</em>
                        </template>
                        <b-dropdown-item href="#">EN</b-dropdown-item>
                        <b-dropdown-item href="#">KH</b-dropdown-item>
                    </b-nav-item-dropdown>
                </li>
                <li class="nav-item">

                    <b-nav-item-dropdown right>
                        <template #button-content>
                            <em>Login</em>
                        </template>
                        <b-dropdown-item @click="openModalBorrwerLogin">Borrower</b-dropdown-item>
                        <b-dropdown-item href="/front/bank_review">Bank</b-dropdown-item>
                    </b-nav-item-dropdown>
                </li>
            </ul>

            </div>
        </nav> <!-- /.navbar -->
        </header>

        <div v-if="modalBorrowerShow">
            <modal-borrower-login :modalType="modalBorrowerType" @closeModal="closeModalBorrwerLogin"></modal-borrower-login>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return{
            modalBorrowerShow: false,
            modalBorrowerType: 0,
        }
    },
    components: {
        ModalBorrowerLogin: () => import('./modal_borrower_login.vue')
    },
    methods: {
        openModalBorrwerLogin(){
            this.modalBorrowerShow = true;
            this.modalBorrowerType = 1;
        },
        closeModalBorrwerLogin(){
            this.modalBorrowerShow = false;
            this.modalBorrowerType = 0;
        },
    }
}
</script>
<style scoped>
body{
    font-family: 'Roboto Condensed', sans-serif;
}

#header {
	position: relative;
}

#header .navbar-brand {
	padding-top: 1.313rem;
	padding-bottom: 1.313rem;
    margin-left: 30px;
}

#header .navbar-nav {
	text-transform: uppercase;
    margin-right: 50px !important;
}

#header .bg-nav {
	background-color: #34495e;
    color: white !important;

}

#header .navbar-nav .nav-link.active {
	color:rgba(255,255,255,.5);

}
/deep/ .dropdown span{
    color: white;
}
.dropdown em{
    color: white;
}

ul li a{
    color: white !important;
}
/deep/ .custom-modal{
    border-radius: 15px;
}
</style>
