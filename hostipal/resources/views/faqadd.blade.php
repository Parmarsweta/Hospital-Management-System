<form action="/faqadd" method="post">
    @csrf
    <label>FAQ Question</label>
    <input type="text" name="faq_question"><br>
    <label>FAQ Answer</label>
    <input type="text" name="faq_answer"><br>
    <button type="submit">Submit</button>
                
</form>