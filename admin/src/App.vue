<template>
    <div id="app">
        <canvas v-show="canvasShow== 1"></canvas>
        <transition name="bounce">
            <router-view></router-view>
        </transition>
    </div>
</template>
<script>
import can from 'src/assets/js/canvas'
export default {
    name: 'app',
    data() {
        return {
            canvasShow: 1 //1显示canvas
        }
    },
    methods: {
        _canvasShow() {
            let data = this.$route.query
            if (data) {
                if (data.canvasShow) {
                    this.canvasShow = parseInt(data.canvasShow)
                } else {
                    this.canvasShow = 1
                }
            }
        }
    },
    created() {
        this._canvasShow()
    },
    components: {},
    watch: {
        '$route' (to, from) {
            if (to.meta.canvasShow == true) {
                this.canvasShow = 1
            }
        }
    },
}
</script>
<style>
canvas {
    width: 95%;
    height: 98%;
}

@import "assets/css/font-awesome.min.css";
.bounce-enter-active {
    animation: bounce-in .5s;
}

.bounce-leave-active {
    animation: bounce-out .2s;
}

@keyframes bounce-in {
    0% {
        transform: scale(0);
    }
    50% {
        transform: scale(1.05);
    }
    100% {
        transform: scale(1);
    }
}

@keyframes bounce-out {
    0% {
        transform: scale(1);
    }
    50% {
        transform: scale(0.95);
    }
    100% {
        transform: scale(0);
    }
}

body {
    margin: 0px;
    padding: 0px;
    background: #1F2D3D;
    font-family: Helvetica Neue, Helvetica, PingFang SC, Hiragino Sans GB, Microsoft YaHei, SimSun, sans-serif;
    font-weight: 400;
    -webkit-font-smoothing: antialiased;
}

#app {
    position: absolute;
    top: 0px;
    bottom: 0px;
    width: 100%;
}

.el-submenu [class^=fa] {
    vertical-align: baseline;
    margin-right: 10px;
}

.el-menu-item [class^=fa] {
    vertical-align: baseline;
    margin-right: 10px;
}
</style>