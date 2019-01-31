<template>
    <section>
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="approved-tab" data-toggle="tab" href="#approved" role="tab" aria-controls="approved" aria-selected="true">
                    <i class="far fa-thumbs-up"></i> - Mascotas por aprovar
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="rejected-tab" data-toggle="tab" href="#rejected" role="tab" aria-controls="rejected" aria-selected="false">
                    <i class="far fa-thumbs-down"></i> - Mascotas rechazadas
                </a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="approved" role="tabpanel" aria-labelledby="approved-tab">
                <div class="card-columns">
                    <pet-card v-for="pet in petsApproved" :key="pet.uid"
                                :pet="pet"
                                @approve="approve"
                                @reject="reject">
                        <template slot="actions">
                            <button type="button" class="btn btn-success" @click="approve(pet.uid)">
                                <i class="far fa-thumbs-up"></i>
                            </button>
                            <button type="button" class="btn btn-danger" @click="reject(pet.uid)">
                                <i class="far fa-thumbs-down"></i>
                            </button>
                        </template>
                    </pet-card>
                </div>
            </div>
            <div class="tab-pane fade" id="rejected" role="tabpanel" aria-labelledby="rejected-tab">
                <div class="card-columns">
                    <pet-card v-for="pet in petsRejected"
                                :key="pet.uid"
                                :pet="pet">
                        <template slot="actions">
                            <button type="button" class="btn btn-primary" @click="restore(pet.uid)">
                                <i class="fas fa-trash-restore"></i>
                            </button>
                        </template>
                    </pet-card>
                </div>
            </div>
        </div>
    </section>

</template>

<script>
export default {
    data() {
        return {
            petsApproved: [],
            petsRejected: []
        }
    },
    created() {
        this.getPetApprovedList();
        this.getPetRejectedList();
    },
    methods: {
        approve(uid) {
            axios.put(`/pet/${uid}/approve`).then((res) => {
                this.getPetApprovedList();
                this.getPetRejectedList();
            })
            .catch((err) => {
                console.log(err);
            })
        },
        reject(uid) {
            axios.put(`/pet/${uid}/reject`).then((res) => {
                this.getPetApprovedList();
                this.getPetRejectedList();
            })
            .catch((err) => {
                console.log(err);
            })
        },
        restore(uid) {
            axios.put(`/pet/${uid}/restore`).then((res) => {
                this.getPetApprovedList();
                this.getPetRejectedList();
            })
            .catch((err) => {
                console.log(err);
            })
        },
        getPetApprovedList() {
            axios.get('/pets/approved').then((res) => {
                this.petsApproved = res.data;
            })
            .catch(console.error)
        },
        getPetRejectedList() {
            axios.get('/pets/rejected').then((res) => {
                this.petsRejected = res.data;
            })
            .catch(console.error)
        }
    }
}
</script>

<style lang="scss" scoped>
.card-columns {
    padding-top: 2rem;
}
</style>

