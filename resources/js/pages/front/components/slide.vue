<template>
    <div>
        <div class="top-carousel">

            <div id="work" class="carousel slide" data-ride="carousel">
                <div class="banner-content text-left">
                <h1 class="text-white">THE ONLY<span> ONE<br> WAY</span> STARTUP BUSINESS FUTURE</h1>
                <p class="col-md-5 adjust text-white">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat veritatis iste, nulla architecto quam saepe? Totam quisquam nam officia dignissimos nesciunt quis molestias, sit hic nulla suscipit unde odit voluptates.
                </p>
                <br>
                    <p class="pt-4">
                        <button class="btn btn-success btn-lg" @click="openModalBorrwerLogin">{{ $t('review') }}</button>
                        <a class="btn btn-success btn-lg" href="/front/request_loan">{{ $t('loan') }}</a>
                    </p>

                     <div class="wrapper mt-3">
                        <div class="button">
                            <div class="icon"><i class="fab fa-facebook-f"></i></div>
                            <span>Facebook</span>
                        </div>
                        <div class="button">
                            <div class="icon"><i class="fab fa-twitter"></i></div>
                            <span>Twitter</span>
                        </div>
                        <div class="button">
                            <div class="icon"><i class="fab fa-instagram"></i></div>
                            <span>Instagram</span>
                        </div>


                        <div class="button">
                            <div class="icon"><i class="fab fa-youtube"></i></div>
                            <span>YouTube</span>
                        </div>
                        </div>
                </div>

                <ol class="carousel-indicators">
                <li data-target="#work" data-slide-to="0" class="active"></li>
                <li data-target="#work" data-slide-to="1"></li>
                <li data-target="#work" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/slides/bg1.png" class="d-block w-100" alt="">

                </div>
                <div class="carousel-item">
                    <img src="/slides/bg2.png" class="d-block w-100" alt="">
                </div>
                <div class="carousel-item">
                    <img src="/slides/bg3.png" class="d-block w-100" alt="">
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


/* social icon */
.wrapper .button{
  display: inline-block;
  height: 40px;
  width: 40px;
  float: left;
  margin: 0 5px;
  overflow: hidden;
  background: #fff;
  border-radius: 50px;
  cursor: pointer;
  box-shadow: 0px 10px 10px rgba(0,0,0,0.1);
  transition: all 0.3s ease-out;
}
.wrapper .button:hover{
  width: 200px;
}
.wrapper .button .icon{
  display: inline-block;
  height: 40px;
  width: 40px;
  text-align: center;
  border-radius: 50px;
  box-sizing: border-box;
  /* line-height: 20px; */
  transition: all 0.3s ease-out;
}
.wrapper .button:nth-child(1):hover .icon{
  background: #4267B2;
}
.wrapper .button:nth-child(2):hover .icon{
  background: #1DA1F2;
}
.wrapper .button:nth-child(3):hover .icon{
  background: #E1306C;
}

.wrapper .button:nth-child(4):hover .icon{
  background: #ff0000;
}
.wrapper .button .icon i{
  font-size: 25px;
  line-height: 60px;
  transition: all 0.3s ease-out;
}
.wrapper .button:hover .icon i{
  color: #fff;
}
.wrapper .button span{
  font-size: 20px;
  font-weight: 500;
  line-height: 60px;
  margin-left: 10px;
  transition: all 0.3s ease-out;
}
.wrapper .button:nth-child(1) span{
  color: #4267B2;
}
.wrapper .button:nth-child(2) span{
  color: #1DA1F2;
}
.wrapper .button:nth-child(3) span{
  color: #E1306C;
}
.wrapper .button:nth-child(4) span{
  color: #ff0000;
}
</style>

