<template>
  <div>
    <header-page></header-page>
    <slide></slide>
    <div class="justify-content-center team-block" id="team">
      <team></team>
    </div>
  </div>
</template>
<script>
import headerPage from "../components/header";
import slide from "../components/slide";
import team from "../components/team";
export default {
  components: {
    headerPage,
    slide,
    team,
  },
};
</script>
<style scoped>
.team-block {
  /* min-height: 100%; */
  /* background: linear-gradient(20deg, #ff2844, #6741ff); */
  margin-top: 174px;
  margin-bottom: 185px;
}
</style>
