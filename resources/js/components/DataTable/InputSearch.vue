<template>
    <div class="form-group row">
        <div class="col col-lg-3">
            <input type="search"
                @input="searchHandle"
                class="form-control"
                placeholder="Buscar..."
                aria-label="search" aria-describedby="search-addon">
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            query: '',
        }
    },
    methods: {
        searchHandle(e) {
            const trs = this.$parent.$refs.table.querySelectorAll('tbody tr');
            const query = e.target.value.toUpperCase();

            trs.forEach(tr => {
                const tds = tr.querySelectorAll("td");
                let isValid = false;

                tds.forEach(td => {
                    if (td.attributes.hasOwnProperty('searchable')) {
                        const txtValue = td.textContent || td.innerText;

                        if (txtValue.toUpperCase().includes(query)) {
                            isValid = true;
                        }
                    }
                });

                if (isValid) {
                    tr.style.display = "";
                } else {
                    tr.style.display = "none";
                }
            });
        }
    }
}
</script>

<style>

</style>
