<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Ambientando Vue no Laravel</div>


                    <section>
                        <div class="card-body">
                            <input type="text" v-model="test">
                            {{test}}
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: () => {
        return {
            test: ''}
    },
    mounted() {
        console.log('Component mounted.')
    }
}
</script>
