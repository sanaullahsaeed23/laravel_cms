import tinymce from 'tinymce/tinymce';
import 'tinymce/themes/silver/theme';

tinymce.init({
    selector: 'textarea',
    plugins: ['advlist autolink lists link image charmap print preview anchor', 'searchreplace visualblocks code fullscreen', 'insertdatetime media table paste code help wordcount'],
    toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help'
});
