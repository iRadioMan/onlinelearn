<template>
  <div>
    <transition-group name="list" tag="div">
      <div class="questionCard" v-for="(question, itemId) in questions" :key="question.id">
        <div class="questionManage">
          <input :name="'questions['+ itemId +'][id]'" type="hidden" :value="question.id">
          <input :name="'questions['+ itemId +'][description]'" class="questionDescription" type="text" v-model="question.description">
          <button type="button" class="btn btn-primary" @click="addAnswer(itemId)">Добавить ответ</button>
          <div>
            <button type="button" class="deleteButton btn btn-danger" @click="deleteAnswer(itemId)">x</button>
          </div>
        </div>
        <transition-group name="list" tag="div">
          <div class="my-2" v-for="(question_option, qoId) in question.question_options" :key="question_option.id">
            <input :name="'questions['+ itemId +'][question_options]['+ qoId +'][id]'" type="hidden" :value="question_option.id">
            <input :name="'questions['+ itemId +'][question_options]['+ qoId +'][correct]'" type="checkbox" v-model="question_option.correct">
            <input :name="'questions['+ itemId +'][question_options]['+ qoId +'][description]'" type="text" class="questionDescription" v-model="question_option.description">
            <button type="button" class="deleteAnswerButton btn btn-danger" @click="deleteOption(question, question_option)">x</button>
          </div>
        </transition-group>
      </div>
    </transition-group>
    <button type="button" class="btnAddQuestion btn btn-outline-primary" @click="addQuestion">Добавить вопрос</button>
  </div>
</template>

<script>

export default {
  props: [
    'orig_lesson'
  ],
  data: function(){
    return {
      lesson: {},
      questions: [
        
      ]
    }
  },
  mounted(){
    this.lesson = JSON.parse(this.orig_lesson);
    this.questions = this.lesson.questions;
  },
  components: {
    
  },
  methods: {
    addQuestion(){
      this.questions.push({
        id: Math.floor(Math.random() * 100000) * -1,
        description: "Новый вопрос",
      })
    },
    addAnswer(id){
      if(!this.questions[id].question_options){
        this.questions[id].question_options = [];
      }
      this.questions[id].question_options.push(
        {
          id: Math.floor(Math.random() * 100000) * -1,
          description: "Новый ответ",
          correct: false,
        }
      );
      this.$forceUpdate();
    },
    deleteOption(question, questionOption){
      question.question_options.splice(question.question_options.indexOf(questionOption), 1);
      this.$forceUpdate();
    },
    deleteAnswer(id){
      this.questions.splice(id, 1);
    }
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 35px;
  display: flex;
    flex-direction: column;
    align-items: center;
}

.questionDescription {
  width: 450px;
}

.answerDescription {
  width: 350px;
}

.btnAddQuestion {
  margin: 20px;
}

.btn-primary {
  margin-left: 15px;
  margin-right: 15px;
} 

.questionCard {
    padding: 20px;
    margin: 35px 0;
    background: #f8f9fa;
    border: 1px solid #bfbebe;
    position: relative;
}

.deleteButton {
  cursor: pointer;
  position: absolute;
  right: -20;
  top: -20px;
  width: 40px;
  height: 40px;
}

.deleteAnswerButton {
  height: 30px;
  padding: 0px;
  width: 30px;
  margin-bottom: 1px;
}

.questionManage {
  display: flex;
  margin-bottom: 25px;
}

.list-enter-active, .list-leave-active {
  transition: all .25s;
}
.list-enter, .list-leave-to /* .list-leave-active до версии 2.1.8 */ {
  opacity: 0;
  transform: scale(0);
}

</style>
