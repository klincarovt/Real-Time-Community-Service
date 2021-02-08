<template>
    <div>
        {{message.user_id}}: {{message.message}}
    </div>
</template>

<script>
export default{
    props:['message']
        
}
</script>