<template>
    <div>
        <div class="SharpViewPanel__glasspane" v-show="show" @click="$emit('change', false)"></div>
        <transition
            enter-class="SharpViewPanel--collapsed"
            enter-active-class="SharpViewPanel--expanding"
            enter-to-class="SharpViewPanel--expanded"
            leave-class="SharpViewPanel--expanded"
            leave-active-class="SharpViewPanel--collapsing"
            leave-to-class="SharpViewPanel--collapsed"
        >
            <div class="SharpViewPanel" v-show="show">
                <iframe v-if="content" :src="`data:text/html;charset=utf-8$,${encodeURIComponent(content)}`"
                        style="height:100%;width:100%" height="100%" width="100%" frameborder="0">
                </iframe>
            </div>
        </transition>
    </div>
</template>

<script>
    export default {
        name: 'SharpViewPanel',
        model: {
            prop: 'show',
            event: 'change'
        },
        props: {
            show: Boolean,
            content: String
        }
    }
</script>