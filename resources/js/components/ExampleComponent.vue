<template>
    <div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>
                    <div class="card-body">
                        I'm an example component.
                    </div>
                    <div>
                        {{ info }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                info: 'test',
                _token: null,
            };
        },
        mounted() {
            axios.post('http://l12.stspecmontag.com.ua/send', {params:{massege: 'Hello,'}}).then(response => (this.info = response.data));
        }
    }
</script>