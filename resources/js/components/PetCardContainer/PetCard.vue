<template>
    <div class="card" v-if="pet">
        <img class="card-img" :src="image" :alt="pet.name"/>
        <div class="card-img-overlay">
            <h4 class="card-title text-truncate">
                <i v-if="pet.gender == 'M'" class="fas fa-venus" style="color: #ff80ab"></i>
                <i v-if="pet.gender == 'H'" class="fas fa-mars" style="color: #8c9eff"></i>
                <span v-text="pet.name"></span>
            </h4>
            <small class="card-subtitle">
                <i class="far fa-clock"></i>
                {{pet.created_at}}
            </small>
            <p class="card-text mt-auto" v-text="pet.description"></p>
            <div class="card-accions">
                <slot name="actions"></slot>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['pet'],
    computed: {
        image() {
            return `/storage/images/pets/${this.pet.uid}/${this.pet.images[0].filename}`;
        }
    }
}
</script>

<style lang="scss" scoped>
.card {
    transition: all .5s;
    border-radius: 8px;
    border: none;
    box-shadow: 0 6px 10px 0 rgba(0, 0, 0, 0.14), 0 1px 18px 0 rgba(0, 0, 0, 0.12), 0 3px 5px -1px rgba(0, 0, 0, 0.3);
    overflow: hidden;
    min-height: 280px;
    position: relative;

    img.card-img {
        transition: all 2s;
        transform: scale(1);
    }

    .card-img-overlay {
        color: white;
        background: linear-gradient(to bottom, rgba(#000, .7), transparent);
        display: flex;
        flex-direction: column;

        .card-text {
            transition: opacity .5s;
            opacity: 0;
        }

        .card-accions {
            margin-top: auto;
            display: flex;
            justify-content: space-around;

            button.btn {
                width: 60px;
                height: 60px;
                border-radius: 50%;
                font-size: x-large;
                box-shadow: 0 6px 10px 0 rgba(0, 0, 0, 0.14), 0 1px 18px 0 rgba(0, 0, 0, 0.12), 0 3px 5px -1px rgba(0, 0, 0, 0.3);
                display: flex;
                justify-content: center;
                align-items: center;
            }
        }
    }

    &:hover {
        cursor: pointer;
        box-shadow: 0 16px 24px 2px rgba(0, 0, 0, 0.14), 0 6px 30px 5px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.3);

        img.card-img {
            transform: scale(1.2);
        }

        .card-img-overlay {

            .card-text {
                opacity: 1;
            }
        }
    }
}
</style>

