<template>
  <div>
    <center>
      <vue-glide>
        <vue-glide-slide v-for="(obj, index) in teamList" :key="index">
          <!-- Slide {{ i }} -->

          <div class="profile-container">
            <div class="img-container">
              <img :src="`/teams/${obj.photo}`" alt="profile image">
            </div>
            <p class="info full-name">{{ obj.name }}</p>
            <p class="info role">
              <i class="fas fa-star"></i>
              {{ obj.dutie }}
            </p>
            <p class="info place">
              <i class="fas fa-map-marker-alt"></i>
              {{ obj.university }}
            </p>

            <div class="posts-info">
              <p>
                <span>{{ $t("year") }}</span> {{ obj.year }}
              </p>
              <p>
                <span>{{ $t("semester") }}</span> {{ obj.semester }}
              </p>
              <p>
                <span>{{ $t("class") }}</span> {{ obj.class }}
              </p>
            </div>

            <div class="social-container">
              <button class="facebook">
                <i class="fab fa-facebook"></i>
              </button>
              <button class="instagram">
                <i class="fab fa-instagram"></i>
              </button>
              <button class="youtube">
                <i class="fab fa-youtube"></i>
              </button>
              <button class="github">
                <i class="fab fa-github"></i>
              </button>
            </div>

            <button class="action">Follow</button>
            <button class="action message">Message</button>
          </div>
        </vue-glide-slide>
      </vue-glide>
    </center>
  </div>
</template>
<script>
export default {
  data() {
    return {
      teamList: [
        {
          photo: "phearoth.jpg",
          name: "THOEURN PHEAROTH",
          dutie: "System Analyst",
          university: "Royal University Of Phnom Penh",
          year: 2,
          semester: 2,
          class: "E7",
        },
        {
          photo: "chaileng.jpg",
          name: "TIM CHHAILENG",
          dutie: "Application Developer",
          university: "Royal University Of Phnom Penh",
          year: 2,
          semester: 2,
          class: "E7",
        },
        {
          photo: "phorn.jpg",
          name: "SEUM SOTTTHIPORN",
          dutie: "Application Developer",
          university: "Royal University Of Phnom Penh",
          year: 2,
          semester: 2,
          class: "E7",
        },
        {
          photo: "nga.jpg",
          name: "SOR NGA",
          dutie: "System Analyst",
          university: "Royal University Of Phnom Penh",
          year: 2,
          semester: 2,
          class: "E7",
        },
        {
          photo: "mosa.jpg",
          name: "EL MOSA",
          dutie: "FOUNDER DOCUMENT",
          university: "Royal University Of Phnom Penh",
          year: 2,
          semester: 2,
          class: "E7",
        },
        {
          photo: "david.jpg",
          name: "MOEURN SODAVID",
          dutie: "DOCUMENT WRITER",
          university: "Royal University Of Phnom Penh",
          year: 2,
          semester: 2,
          class: "E7",
        },
      ],
    };
  },
};
</script>
<style scoped>
.profile-container {
  /* margin-right: 36px; */
  position: relative;
  background-color: #fff;
  width: 350px;
  padding: 100px 50px 40px;
  border-radius: 12px;
  box-shadow: 0 0 60px 5px rgba(0, 0, 0, 0.2);
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  cursor: pointer;
}

.img-container {
  width: 130px;
  height: 130px;
  overflow: hidden;
  border: 5px solid #b92a76;
  border-radius: 50%;
  box-shadow: 0 8px 55px #b92a76a4;
  position: absolute;
  top: 0;
  left: 50%;
  transform: translate(-50%, -50%);
}

.img-container img {
  width: 100%;
  max-width: 100%;
  transform: scale(1.1);
}

.info {
  margin-bottom: 12px;
}

.info i {
  margin-right: 8px;
  font-size: 1.1em;
}

.place {
  margin-bottom: 40px;
}

.full-name {
  font-size: 1.4em;
  font-weight: bold;
  letter-spacing: 1px;
  color: #b92a76;
}

.posts-info {
  width: 100%;
  display: flex;
  justify-content: space-around;
  align-items: center;
  font-size: 1.1em;
  letter-spacing: 0.5px;
  margin-bottom: 30px;
  text-align: center;
}

.posts-info span {
  display: block;
  font-weight: bold;
  margin-bottom: 4px;
}

.social-container {
  width: 100%;
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 20px;
}

.social-container i {
  color: #fff;
}

.social-container button {
  border: none;
  outline: none;
  width: 45px;
  height: 45px;
  border-radius: 50%;
  font-size: 1.2em;
  cursor: pointer;
  box-shadow: 0px 5px 25px rgba(0, 0, 0, 0.15);
  transition: transform 0.3s;
}

.social-container button:hover {
  transform: scale(1.1);
}

/* Social colors */

.social-container button.youtube {
  background: linear-gradient(45deg, #ff000088, #ff0000);
}

.social-container button.facebook {
  background: linear-gradient(45deg, #0e76a888, #0e3da8);
}

.social-container button.instagram {
  background: linear-gradient(45deg, #e6683ccc 25%, #dc2743 50%, #bc1888 100%);
}

.social-container button.github {
  background: linear-gradient(45deg, #33333388, #333333);
}

.action {
  outline: none;
  cursor: pointer;
  color: #fff;
  background-color: #d31258;
  border: none;
  border-radius: 50px;
  padding: 12px 20px;
  width: 80%;
  margin-top: 25px;
  box-shadow: 0px 8px 25px rgba(0, 0, 0, 0.2);
  text-transform: uppercase;
  font-size: 1em;
  font-weight: bold;
  letter-spacing: 2px;
  transition: transform 0.3s, opacity 0.3s;
}

.action.message {
  background-color: #6741ff;
}

.action:hover {
  transform: scale(1.05);
  opacity: 0.85;
}
</style>
