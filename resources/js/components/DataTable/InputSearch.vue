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
    props: ['rows'],
    data() {
        return {
            query: '',
        }
    },
    methods: {
        searchHandle(e) {
            const query = e.target.value.toUpperCase();

            this.rows.forEach(row => {
                const cols = row.querySelectorAll("td");
                let isValid = false;

                cols.forEach(col => {
                    if (col.attributes.hasOwnProperty('searchable')) {
                        const txtValue = col.textContent || col.innerText;

                        if (txtValue.toUpperCase().includes(query)) {
                            isValid = true;
                        }
                    }
                });

                if (isValid) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        }
    }
}
</script>

<style>

</style>
