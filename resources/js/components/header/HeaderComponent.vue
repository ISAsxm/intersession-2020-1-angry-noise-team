<style>
.header {
    display: flex;
    justify-content: center;
}
.header .list {
    display: flex;
    list-style: none;
    align-items: center;
    justify-content: center;
    margin: 0;
    padding: 0;
}
.header .list .item {

}
.header .list .item a {
    color: black;
}
.header .list .item a:hover {
    text-decoration: none;
}
.header .list .item img {
    width: 150px;
    margin: 0 100px;
}
</style>

<template>
    <nav class="header">
        <ul class="list">
            <li class="item"><a href="#">Accueil</a></li>
            <li class="item"><img src="https://www.biovotion.com/content/images/2018/03/logo-placeholder-1.jpg"  alt="logo"/></li>
            <li class="item"><a href="#">GoFounding</a></li>
        </ul>
    </nav>
</template>

<script>

export default {
    name: 'header-component'
}
</script>
