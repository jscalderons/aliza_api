<template>
    <div>
        <input-search />
        <div class="table-responsive">
            <table class="table" ref="table">
                <thead>
                    <slot name="thead"></slot>
                </thead>
                <tbody>
                    <slot name="tbody"></slot>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import InputSearch from './InputSearch';

export default {
    components: {
        InputSearch
    }
}
</script>

