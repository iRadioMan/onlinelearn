<template>
  <div id="app">
    <button class="btnAddQuestion" @click="addQuestion">Добавить вопрос</button>
    <transition-group name="list" tag="div">
      <div class="questionCard" v-for="(question, itemId) in questions" :key="question.id">
        <div class="questionManage">
          <input class="questionDescription" type="text" v-model="question.description">
          <button @click="addAnswer(itemId)">Добавить ответ</button>
          <div>
            <button class="deleteButton" @click="deleteAnswer(itemId)">x</button>
          </div>
        </div>
        <transition-group name="list" tag="div">
          <div v-for="question_option in question.question_options" :key="question_option.id">
            <input type="checkbox" v-model="question_option.correct">
            <input type="text" v-model="question_option.description">
            <button class="deleteAnswerButton" @click="deleteOption(question, question_option)">x</button>
          </div>
        </transition-group>
      </div>
    </transition-group>
  </div>
</template>

<script>

export default {
  name: 'App',
  data: function(){
    return {
      questions: [
        {
          id: 1,
          description: "Текст вопроса",
          question_options: [
            {
                id: 1,
                correct: true,
                description: "Вариант ответа 1"
            },
            {
                id: 2,
                correct: false,
                description: "Вариант ответа 2"
            }
          ]
        }
      ]
    }
  },
  components: {
    
  },
  methods: {
    addQuestion(){
      this.questions.push({
        id: Math.floor(Math.random() * 10000) * -1,
        description: "Новый вопрос",
      })
    },
    addAnswer(id){
      if(!this.questions[id].question_options){
        this.questions[id].question_options = [];
      }
      this.questions[id].question_options.push(
        {
          id: Math.floor(Math.random() * 10000) * -1,
          description: "Новый ответ",
          correct: false
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
  margin-top: 60px;
  display: flex;
    flex-direction: column;
    align-items: center;
}

.questionDescription{
  font-size: 2rem;
}

.btnAddQuestion{
  margin-bottom: 20px;
  padding: 10px;
}

.questionCard{
    padding: 20px;
    margin: 20px 0;
    background: #efefef;
    border: 1px solid #bfbebe;
    position: relative;
}

.deleteButton{
  cursor: pointer;
  position: absolute;
  right: -20;
  top: -20px;
  width: 40px;
  height: 40px;
  border-radius: 100%;
  border: 3px solid #ff8080;
  background: red;
  color: white;
  font-size: 1.5rem;
}

.deleteAnswerButton{
  border-radius: 100%;
  border: 1px solid #ff8080;
  background: red;
  color: white;
  cursor: pointer;
}

.questionManage{
  display: flex;
}

.list-enter-active, .list-leave-active {
  transition: all .25s;
}
.list-enter, .list-leave-to /* .list-leave-active до версии 2.1.8 */ {
  opacity: 0;
  transform: scale(0);
}

</style>
