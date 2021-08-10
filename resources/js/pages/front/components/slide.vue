<template>
  <div>
    <div class="top-carousel">
      <div id="work" class="carousel slide" data-ride="carousel">
        <div class="banner-content text-left">
          <h1 class="text-white" v-if="$i18n.locale == 'en'">
            THE ONLY<span>
              ONE<br />
              WAY</span
            >
            STARTUP BUSINESS FUTURE
          </h1>
          <h1 class="text-white" v-if="$i18n.locale == 'kh'">
            THE ONLY<span>
              ONE<br />
              WAY</span
            >
            STARTUP BUSINESS FUTURE
          </h1>
          <p class="col-md-5 adjust text-white">
            Keep your time for work. A few minutes to complete and submit form.
            Capture your document then send. Short time waiting for request.
            Notify by your phone. Keep in touch together. Safe and truth. Early
            approval with bank.
          </p>
          <br />
          <p class="pt-4">
            <button
              class="btn btn-lg btnReviewLoan"
              @click="openModalBorrwerLogin"
            >
              <i class="fas fa-clipboard-list mr-2"></i>
              {{ $t("review") }}
            </button>
            <a class="btn btn-lg btnReviewLoan" href="/front/request_loan">
              <i class="fas fa-landmark mr-2"></i>
              {{ $t("loan") }}</a
            >
          </p>

          <div class="social-icon">
            <ul>
              <li>
                <a href="javascript:;"
                  ><i class="fab fa-facebook" aria-hidden="true"></i
                ></a>
              </li>
              <li>
                <a href="javascript:;"
                  ><i class="fab fa-instagram" aria-hidden="true"></i
                ></a>
              </li>
              <li>
                <a href="javascript:;"
                  ><i class="fab fa-telegram" aria-hidden="true"></i
                ></a>
              </li>
              <li>
                <a href="javascript:;"
                  ><i class="fab fa-youtube" aria-hidden="true"></i
                ></a>
              </li>
            </ul>
          </div>
        </div>

        <ol class="carousel-indicators">
          <li data-target="#work" data-slide-to="0" class="active"></li>
          <li data-target="#work" data-slide-to="1"></li>
          <li data-target="#work" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="/slides/bg1.png" class="d-block w-100" alt="" />
          </div>
          <div class="carousel-item">
            <img src="/slides/bg2.png" class="d-block w-100" alt="" />
          </div>
          <div class="carousel-item">
            <img src="/slides/bg3.png" class="d-block w-100" alt="" />
          </div>
        </div>
      </div>
    </div>
    <div v-if="modalBorrowerShow">
      <modal-borrower-login
        :modalType="modalBorrowerType"
        @closeModal="closeModalBorrwerLogin"
      ></modal-borrower-login>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      modalBorrowerShow: false,
      modalBorrowerType: 0,
    };
  },
  components: {
    ModalBorrowerLogin: () => import("./ModalBorrowerLogin.vue"),
  },
  methods: {
    openModalBorrwerLogin() {
      this.modalBorrowerShow = true;
      this.modalBorrowerType = 1;
    },
    closeModalBorrwerLogin() {
      this.modalBorrowerShow = false;
      this.modalBorrowerType = 0;
    },
  },
};
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
.btnReviewLoan {
  background: transparent !important;
  color: white !important;
  border: 2px solid white !important;
  font-weight: bold;
}

.btnReviewLoan:hover {
  border-color: transparent !important;
  background-color: #ff3377 !important;
}

.btn {
  padding: 10px 30px;
  color: #333;
  border-radius: 50px;
  text-transform: uppercase;
  font-family: "Roboto Condensed", sans-serif;
  font-size: 16px;
}

@keyframes shadow-pulse {
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

.adjust {
  margin-left: -18px;
}

/* social icon */
.social-icon ul {
  position: absolute;
  top: 383px;
  left: 9%;
  transform: translate(-50%, -50%);
  margin: 0;
  padding: 0;
  display: flex;
}

.social-icon ul li {
  list-style: none;
}

.social-icon ul li a {
  position: relative;
  width: 60px;
  height: 60px;
  display: block;
  text-align: center;
  margin: 0 10px;
  border-radius: 50%;
  padding: 6px;
  box-sizing: border-box;
  text-decoration: none;
  box-shadow: 0 10px 15px rgba(0, 0, 0, 0.3);
  background: linear-gradient(0deg, #ddd, #fff);
  transition: 0.5s;
}

.social-icon ul li a:hover {
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
  text-decoration: none;
}

.social-icon ul li a .fab {
  width: 100%;
  height: 100%;
  display: block;
  background: linear-gradient(0deg, #fff, #ddd);
  border-radius: 50%;
  line-height: calc(60px - 12px);
  font-size: 24px;
  color: #262626;
  transition: 0.5s;
}

.social-icon ul li:nth-child(1) a:hover .fab {
  color: white;
  background: #3b5998;
}

.social-icon ul li:nth-child(2) a:hover .fab {
  color: white;
  background: #d6249f;
  background: radial-gradient(
    circle at 30% 107%,
    #fdf497 0%,
    #fdf497 5%,
    #fd5949 45%,
    #d6249f 60%,
    #285aeb 90%
  );
}

.social-icon ul li:nth-child(3) a:hover .fab {
  color: white;
  background: #0088cc;
}

.social-icon ul li:nth-child(4) a:hover .fab {
  color: white;
  background: #ff0000;
}
</style>

