<template>
    <div class="alert">
      <div class="alert-header">
        <h2>{{ title }}</h2>
      </div>
      <div class="alert-content">
        {{ message }}
      </div>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      title: String,
      message: String
    }
  };
  </script>