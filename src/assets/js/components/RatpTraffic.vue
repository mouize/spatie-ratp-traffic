<template>
    <tile :position="position" modifiers="overflow">
        <section class="ratp">
                <table class="table table-striped table-dark">
                    <tbody>
                    <tr v-for="status in traffics[transporter]">
                        <td><img :src="status.icon" /></td>
                        <td>{{status.title}}</td>
                    </tr>
                    </tbody>
                </table>
        </section>
    </tile>
</template>

<script>
    import Tile from './atoms/Tile';

    export default {

        components: {
            Tile,
        },

        props: ['position', 'transporter'],

        data() {
            return {
                traffics: [],
            };
        },

        created() {
            this.$root.echo
                .private('dashboard')
                .listen('.RatpTraffic.Events.Traffic', response => {
                    this.traffics = response.traffics;
                });
        },
    };
</script>

<style>
    .ratp table td {
        padding: 3px;
        text-align: center;
    }
    .ratp img {
        max-width: 45px;
    }
</style>
