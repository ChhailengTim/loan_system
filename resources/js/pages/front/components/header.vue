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
                        <b-dropdown-item href="#">Bank</b-dropdown-item>
                    </b-nav-item-dropdown>
                </li>
            </ul>

            </div>
        </nav> <!-- /.navbar -->
        </header>

        <div v-if="modalBorrowerShow">
            <b-modal
                v-model="modalBorrowerShow"
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
        </div>
    </div>
</template>
<script>
export default {
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
