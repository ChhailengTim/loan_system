<template>
  <div>
    <header-page></header-page>

    <slide></slide>

    <div class="justify-content-center team-block" id="team">
      <team></team>
    </div>

    <div class="justify-content-center about-block" id="about">
      <about-us></about-us>
    </div>

    <div id="contact">
        <footer-page></footer-page>
    </div>

  </div>
</template>
<script>
import headerPage from "../components/header";
import slide from "../components/slide";
import team from "../components/team";
import aboutUs from "../components/about_us";
import footerPage from "../components/footer";
export default {
  components: {
    headerPage,
    slide,
    team,
    aboutUs,
    footerPage,
  },
};
</script>
<style scoped>
.team-block {
  margin-top: 76px;
  margin-bottom: 150px;
}
.about-block {
  /* margin-top: 174px; */
  margin-bottom: 150px;
}
</style>
