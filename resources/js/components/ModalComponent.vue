<template>
    <div class="modal fade" :id="modalDataId" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">

                        <slot name="modal-title">Modal Title</slot>

                    </h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <div class="modal-body">

                    <slot name="modal-body">Modal Body</slot>

                </div>
                <div class="modal-footer">

                    <slot name="modal-footer"></slot>
                    
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        modalDataTarget: {
            type: String,
            required: true,
        },
        modalDataId: {
            type: String,
            required: true,
        },
        iterable: {
            type: Object | Array,
        }
    }
    
}
</script>
