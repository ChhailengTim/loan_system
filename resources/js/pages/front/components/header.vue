<template>
    <div>

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
                <a class="nav-link" href="/front/home">{{ $t('home') }}</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="javascript:;">{{ $t('service') }}</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="javascript:;">{{ $t('team') }}</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="javascript:;">{{ $t('about_us') }}</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="javascript:;">{{ $t('contact_us') }}</a>
                </li>
                <li class="nav-item">

                    <b-nav-item-dropdown right>
                        <template #button-content>
                            <em>{{ $t('login') }}</em>
                        </template>
                        <b-dropdown-item @click="openModalBorrwerLogin">{{ $t('borrower') }}</b-dropdown-item>
                        <b-dropdown-item href="/front/bank_review">{{ $t('bank') }}</b-dropdown-item>
                    </b-nav-item-dropdown>
                </li>
                <li class="nav-item" style="margin-top: -9px;">
                    <b-nav-item-dropdown right>
                        <template #button-content>
                            <em>
                                <img :src="'/assets/img/languages_logo/'+ languageLogo" class="flag-img" alt="flag">
                                <!-- {{ $i18n.locale | uppercase }} -->
                            </em>
                        </template>
                        <b-dropdown-item
                            href="javascript:void(0);"
                            v-for="(lang, index) in langs"
                            :key="index"
                            @click="changeLang(lang)"
                        >
                        <img :src="'/assets/img/languages_logo/'+ lang.logo" class="flag-img" alt="flag">
                        <span class="text-dark ml-2">{{ lang.text }}</span>
                        </b-dropdown-item>
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
            langs: [
                    {value: 'en', text: 'English', logo: 'en.png'},
                    {value: 'kh', text: 'ខ្មែរ', logo: 'kh.png'},
                    {value: 'th', text: 'ประเทศไทย', logo: 'th.png'},
                ],
        }
    },
    components: {
        ModalBorrowerLogin: () => import('./modal_borrower_login.vue')
    },
    computed: {
        languageLogo(){
            let img = this.langs.find(obj => obj.value == this.$i18n.locale)
            return img.logo
        }
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
        changeLang(evt){
                this.$i18n.locale = evt.value
                this.$validator.localize(evt.value)

                localStorage.lang = evt.value
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
.flag-img {
    width: 20px;
    height: 20px;
    margin: 11px 0px;
}


</style>
