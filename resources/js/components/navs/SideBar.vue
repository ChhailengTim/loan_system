<template>
    <div class="sidebar-wrapper sidebar-theme p-2 bg-dark" style="margin-top: -6px; margin-left: -18px">
    <nav id="sidebar">
        <ul class="list-unstyled menu-categories" id="accordionExample">

            <li class="menu" v-for="(item, index) in  getMenuItems()" :key="index" @click="activeMenu(item.key, index)">
                <a
                    v-if="item.subs"
                    :href="'#'+item.key"
                    data-toggle="collapse"
                    class="dropdown-toggle"
                >
                    <div class="text-white">
                        <span><i :class="item.icon" class="pr-2"></i>{{ $t(item.label) }}</span>
                    </div>
                    <div>
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </a>
                <ul v-if="item.subs"
                    class="collapse submenu list-unstyled"
                    :id="item.key"
                >
                    <li v-for="(sub, index) in item.subs" :key="index" >
                        <router-link :to="sub.to">{{ $t(sub.label) }}</router-link>
                    </li>
                </ul>
                 <router-link
                    v-else-if="!item.subs"
                    class="text-white dropdown-toggle"
                    :to="item.to"
                 >
                    <div @click="activeMenu(item.key, index)">
                        <span><i :class="item.icon" class="pr-2"></i>{{ $t(item.label) }}</span>
                    </div>
                </router-link>
            </li>
        </ul>

    </nav>

</div>

</template>
<script>
import { mapGetters } from 'vuex'
export default {
    data() {
        return {
            menuItems: [],
            items: [
                {
                    icon: 'fas fa-tachometer-alt',
                    label: 'dashboard',
                    to: '/dashboard',
                    key: 'dashboard',
                    active: false,
                },
            ],
            is_active: false,
        }
    },
    computed: {
        ...mapGetters({
        }),
    },
    watch: {
    },
    created() {
    },
    methods: {
        getMenuItems(){
            let vm = this

            // filter module only menu
            let moduleMenu = this.rolePermission
            let menu = []
            // menu.push(this.items[0])
            this.items.forEach((obj) => {
                // if menu no subs
                if (vm.$helpers.nullToVoid(obj.subs) == '') {
                        menu.push(obj)
                } else {
                    // if menu has subs
                    let subs = []
                    subs.push(obj.subs)

                    if (vm.$helpers.nullToVoid(subs) != '') {
                        menu.push({
                            icon: obj.icon,
                            label: obj.label,
                            to: obj.to,
                            key: obj.key,
                            active: obj.active,
                            subs: subs,
                        })
                    }
                }
            })
            return menu
        },
        activeMenu(key, index){
           console.log(key);
        }
    }
}
</script>
<style scoped>
a {
    text-decoration: none;
}

i {
    margin-bottom: -2px;
    font-size: 15px;
    color: rgba(111, 111, 111, 0.8);
    /* color: white; */
}
.submenu li a{
    color: #ababab !important;
}
 .menu a:hover div {
    color: rgb(54, 52, 52) !important;
}
.submenu a:hover{
    color: white !important;
}
</style>
