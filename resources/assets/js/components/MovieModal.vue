<template>
    <div id="trailer" class="modal">
        <div class="modal-content">
            <h4 v-text="name"></h4>
            <iframe v-if="youtubeCode" width="100%" height="400" v-bind:src="linkYoutube" frameborder="0" allowfullscreen></iframe>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
        </div>
    </div>
</template>

<script>
    import { ENDPOINTS } from '../config/api';

    export default {
        data() {
            return {
                youtubeCode: "",
                name: ""
            }
        },

        methods: {

        },

        mounted() {
            Event.$on('videopopup', (data) => {
                this.youtubeCode = data.youtube;
                this.name = data.name;
            });
        },

        computed: {
            linkYoutube: function () {
                return ENDPOINTS.URL_YOUTUBE+this.youtubeCode;
            }
        }
    }
</script>