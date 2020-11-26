<template>
    <div>
        <h2>Like Count {{ count }}</h2>
        <button
            type="submit"
            class="btn rounded-pill"
            v-bind:class="{ 'btn-success': !isLiked, 'btn-danger': isLiked }"
            v-text="text"
            v-on:click="react"
        >
            <i class="far fa-thumbs-up mr-2"></i>
        </button>
    </div>
</template>

<script>
export default {
    props: ["username", "post", "liked", "count"],

    data() {
        return {
            isLiked: null,
            text: null
        };
    },

    mounted() {
        // this.text = 'Like';
        // console.log("Component mounted.");
        if (this.liked.includes(this.post)) {
            this.isLiked = true;
            this.text = "Unlike";
        } else {
            this.isLiked = false;
            this.text = "Like";
        }
    },

    methods: {
        react: function() {
            // switch (this.text) {
            //     case "Like":
            //         like();
            //         break;
            //     case "Unlike":
            //         unlike();
            //         break;
            // }

            this.text === "Like" ? this.like() : this.unlike();
        },

        like: function() {
            // alert('like');
            axios
                .post(`/${this.username}/posts/${this.post}/like`)
                .then(response => {
                    this.isLiked = true;
                    this.text = "Unlike";
                })
                .catch(error => console.error("error"));
        },

        unlike: function() {
            // alert('unlike');
            axios
                .post(`/posts/${this.post}/unlike`)
                .then(response => {
                    this.isLiked = true;
                })
                .catch(error => console.error("error"));
        }
    }
};
</script>
