<style>
header.masthead {
  position: relative;
  overflow: hidden;
  padding-top: calc(7rem + 72px);
  padding-bottom: 7rem;
  background-repeat: no-repeat;
  background-position: center center;
  background-attachment: scroll;
  background-size: cover;
  height: 92vh;
}

header.masthead .masthead-content {
  z-index: 1;
  position: relative;
}

header.masthead .masthead-content .masthead-heading {
  font-size: 4rem;
}

header.masthead .masthead-content .masthead-subheading {
  font-size: 2rem;
}

.jumbotron {
  background-color: transparent;
}

.main-btn {
  display: inline-block;
  font-weight: 700;
  text-align: center;
  white-space: nowrap;
  vertical-align: middle;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  border: 2px solid transparent;
  padding: 6px 62px;
  font-size: 16px;
  line-height: 46px;
  color: white;
  cursor: pointer;
  z-index: 5;
  border: 2px solid white;
  border-radius: 10px;
  -webkit-transition: all 0.4s ease-out 0s;
  -moz-transition: all 0.4s ease-out 0s;
  -ms-transition: all 0.4s ease-out 0s;
  -o-transition: all 0.4s ease-out 0s;
  transition: all 0.4s ease-out 0s;
  position: relative;
  text-transform: uppercase;
}

.main-btn:hover {
  background-color: white;
  color: #222a59;
  text-decoration: none;
}

header ul {
  list-style: none;
  font-size: 60px;
}

header li {
  display: inline-block;
}

header li .active {
  background-color: white;
  color: #222a59;
}

h1 {
  text-transform: uppercase;
  font-weight: 600;
}

h2 {
  font-weight: 400;
  font-size: 50px !important;
}

h1,
h2,
h3,
h4,
h5,
h6,
p,
span {
  font-family: "Manrope", sans-serif;
}

@media (max-width: 767px) {
  .main-btn {
    font-size: 14px;
    padding: 0 20px;
    line-height: 40px;
  }
}

@media (min-width: 992px) {
  header.masthead {
    padding-top: calc(10rem + 55px);
    padding-bottom: 10rem;
  }
  header.masthead .masthead-content .masthead-heading {
    font-size: 6rem;
  }
  header.masthead .masthead-content .masthead-subheading {
    font-size: 4rem;
  }
}
</style>
<template>
  <header id="header" class="masthead text-center text-white">
    <div class="jumbotron vertical-center">
      <div class="masthead-content">
        <div class="container">
          <h1 class="masthead-heading mb-0">Solution PHP</h1>
          <h2 class="masthead-subheading mb-4">Analysez votre code en 2-3 clics</h2>
          <ul class="slider-btn rounded-buttons">
            <li><a class="main-btn rounded-one" href="#resume">Découvrir</a></li>
            <li><a class="main-btn rounded-two active" href="#tool">Analyser</a></li>
          </ul>
        </div>
      </div>
    </div>
  </header>
</template>

<script>
export default {
  name: "header-component"
};
</script>
