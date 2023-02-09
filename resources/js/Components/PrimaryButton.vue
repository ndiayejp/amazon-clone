<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button
        :type="type"
        class="
        w-full
            text-center
            items-center
            px-4
            py-3
            bg-[#fcba1f]
            border
            border-transparent
            hover:border-gray-400
            rounded-lg
            text-sm
            font-extrabold
            text-black"
    >
        <slot />
    </button>
</template>
