<?php 

use frontend\assets\ClientAsset;
// ClientAsset::register($this);

$this->title = 'Handlebars Home';
?>

<div class="row">
    
    <div class="col-sm-6">
        <h1>1</h1>
        <section class="posts">
           <script type="text/x-handlebars-template" id="template">
                {{#each .}}
                    {{#unless isVisible}}
                        {{> post-item}}
                    {{/unless}}
                {{/each}}
           </script>
        </section>
    </div>
    <div class="col-sm-6">
        <h1>2</h1>
        <p class="two-col">
            <script type="text/x-handlebars-template" id="template2">
                <h2>Hello {{{ name }}}!</h2>
            </script>
        </p>
    </div>
</div>

<script type='text/x-handlebars-template' id='post-item-template'>
    <article>
        <h2>#{{inc @index 1}} {{ title }}</h2>
        <p>{{ body }}</p>
    </article>
</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="/js/vendor/handlebars-v4.0.2.js"></script>
<script src="/js/handlebars/index.js"></script>


   
