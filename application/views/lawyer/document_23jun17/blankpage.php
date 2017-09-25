<script src="<?php echo base_url() ?>assets/tinymce/js/tinymce/tinymce.min.js"></script>
<div id="main_content">
    <div id="editor_wrapper" style="margin-left:40px; margin-right: 20px; ">
        <form id="docform" action="<?php echo base_url() ?>savetemplate" accept-charset="UTF-8" data-remote="true" method="post"><input name="utf8" type="hidden" value="✓"><input type="hidden" name="_method" value="put">
            <div class="form-group field-cases-casename required" style="margin-top:20px">
                <label class="control-label" for="cases-casename">Doc Name</label>
                <input type="text" class="form-control" name="documentname" value="" placeholder="Untitled Document" style="width: 300px;">
                <div class="help-block"></div>
            </div> 
            <div class="form-group field-cases-casename required" style="margin-top:50px">
                <label class="control-label" for="cases-casename">Description</label>
                <textarea name="description" class="form-control" rows="4" cols="10" style="width: 600px;"></textarea>
                <div class="help-block"></div>
            </div> 
            <div class="form-group field-cases-casename required" style="margin-top:50px">
                <label class="control-label" for="cases-casename">Would you like to save this draft as a Document or a Template?</label>
                <label class="checkbox-inline"><input name="savetype" type="radio" value="1" onclick="saveasdocument(1)">Save as Document</label>
                <label class="checkbox-inline"><input name="savetype" type="radio" value="2" onclick="saveasdocument(2)">Save as Template</label>
            </div> 
            <div id="showcasenamediv" style="display: none">
                <div class="form-group field-cases-casename required" style="margin-top:50px">
                    <label class="control-label" for="cases-casename">Select Case</label>
                    <select id="cases-practicearea" class="select-search form-control" name="casename" style="width: 300px;">
                        <option value="" >Select Case</option>
                        <?php foreach ($caselink as $case) { ?>
                            <option value="<?php echo $case['CaseId']; ?>"><?php echo $case['CaseName']; ?></option>
                        <?php } ?>
                    </select>
                </div> 
            </div>
            <textarea class="form-control FETextInput user-text" id="rsmsgtext" name="Content" placeholder="Type your comment here..." style=""></textarea>
        </form>
        <div id="bottom_div">
        </div>
    </div>

</div>

<script type="text/javascript">
    tinymce.init({
        selector: '#rsmsgtext',
        height: 1000,
        //width: 950,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table contextmenu paste code',
            'fullscreen',
            'template',
            'save',
            'emoticons'
        ],
        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | template | save | emoticons',
        content_css: '//www.tinymce.com/css/codepen.min.css',

    });
</script> 

<script>
    function saveasdocument(data) {
        if (data == 1) {
            $('#showcasenamediv').show();
        } else if (data == 2){
            $('#showcasenamediv').hide();
        }
    }
</script>