<template>
    <div>
        <div class="top-carousel">

            <div id="work" class="carousel slide" data-ride="carousel">
                <div class="banner-content text-left">
                <h1 class="text-white">DESIGN WEBSITE<span> WHICH<br> MAKES</span> YOU PROUD</h1>
                <p class="col-md-5 adjust text-white">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat veritatis iste, nulla architecto quam saepe? Totam quisquam nam officia dignissimos nesciunt quis molestias, sit hic nulla suscipit unde odit voluptates.
                </p>
                <br>
                    <p class="pt-4">
                        <button class="btn btn-success btn-lg" @click="openModalBorrwerLogin">{{ $t('review') }}</button>
                        <a class="btn btn-success btn-lg" href="/front/request_loan">{{ $t('loan') }}</a>
                    </p>
                </div>
                <ol class="carousel-indicators">
                <li data-target="#work" data-slide-to="0" class="active"></li>
                <li data-target="#work" data-slide-to="1"></li>
                <li data-target="#work" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/bg1.png" class="d-block w-100" alt="">

                </div>
                <div class="carousel-item">
                    <img src="/bg2.png" class="d-block w-100" alt="">
                </div>
                <div class="carousel-item">
                    <img src="/bg3.png" class="d-block w-100" alt="">
                </div>
                </div>
            </div>
        </div>
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
        ModalBorrowerLogin: () => import('./ModalBorrowerLogin.vue')
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

.skew-header {
	width: 100%;
	height: 290px;
	background-color: #fff;
	position: absolute;
	left: 0;
	bottom: 0;
	z-index: 999;
	transform: skew(0deg, -5deg) translateY(100px);
}

.carousel-indicators {
	bottom: 350px;

}
.carousel-indicators li {
	width: 12px;
    height: 12px;
    margin-left: 5px;
    background-color: black;

}

.carousel-indicators .active {
    background-color: #216377;
}

.top-carousel .banner-content {
	position: absolute;
	width: 100%;
	z-index: 1000;
	text-align: center;
	top: 250px;
	color: #fff;
    padding: 10px 40px;
}

.top-carousel .banner-content h1 {
	font-size: 64px;
    font-weight: bold;


}
.btn-success{
    background: transparent !important;
    color: white !important;
    border: 2px solid white !important;
}

.btn-success:hover{
    border-color: transparent !important;
    background-color: #ff3377 !important;
}



.btn{
    padding: 10px 30px;
    background: #f7cc4b;
    color: #333;
    border-radius: 50px;
    border: 2px solid #34495e;
    text-transform: uppercase;
    font-family: 'Roboto Condensed', sans-serif;
    font-size: 16px;
}


@keyframes shadow-pulse
{
  0% {
    box-shadow: 0 0 0 0px rgba(255, 255, 255, 0.2);
  }
  100% {
    box-shadow: 0 0 0 20px rgba(255, 255, 255, 0);
  }
}

.learn-today {
	animation: shadow-pulse 2s infinite;
}

.learn-today:hover {
  animation: none;
}


.adjust{
    margin-left: -18px;
}
</style>

