<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GlossarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('glossary')->insert([
            [
                'term' => 'База данных',
                'definition' => '(БД; англ. database) — организованная структура, предназначенная для хранения, изменения и обработки взаимосвязанной информации, преимущественно больших объемов',
            ],
            [
                'term' => 'Кросс-платформенность',
                'definition' => '(англ. cross-platform) — способность программного обеспечения работать с двумя и более аппаратными платформами и (или) операционными системами',
            ],
            [
                'term' => 'Эмулятор',
                'definition' => '(англ. emulator) — аппаратное или программное обеспечение, которое позволяет одной компьютерной системе (называемой хостом) вести себя как другая компьютерная система (называемая гостем)',
            ],
            [
                'term' => 'Integrated Development Environment',
                'definition' => '(IDE; рус. интегрированная среда разработки) — система программных средств, используемая программистами для разработки программного обеспечения',
            ],
            [
                'term' => 'WorldSkills Standard Specification',
                'definition' => '(WSSS; рус. спецификация стандартов WorldSkills) — спецификация стандартов, которая определяет знание, понимание и конкретные компетенции, лежащие в основе лучших международных практик технического и профессионального уровня выполнения работы',
            ],
            [
                'term' => 'Use Case Diagram',
                'definition' => 'Диаграмма вариантов использования. Диаграмма, отражающая отношения между актерами и прецедентами и являющаяся составной частью модели прецедентов, позволяющей описать систему на концептуальном уровне',
            ],
            [
                'term' => 'Предметная область',
                'definition' => 'Часть реального мира, рассматриваемая в пределах данного контекста',
            ],
            [
                'term' => 'UML',
                'definition' => 'Unified Modeling Language (унифицированный язык моделирования). Язык графического описания для объектного моделирования в области разработки программного обеспечения',
            ],
            [
                'term' => 'ТЗ',
                'definition' => 'Техническое задание. Документ, содержащий требования заказчика к объекту закупки, определяющие условия и порядок ее проведения в соответствии с которым осуществляются поставка товара, выполнение работ, оказание услуг и их приемка',
            ],
            [
                'term' => 'Actor',
                'definition' => 'Актер (Use Case). Роль объекта вне системы, который прямо взаимодействует с ее частью — конкретным элементом',
            ],
            [
                'term' => 'Use Case',
                'definition' => 'Вариант использования (прецедент). Описание поведения системы, когда она взаимодействует с кем-то (или чем-то) из внешней среды',
            ],
            [
                'term' => 'Hot Keys',
                'definition' => 'Горячие клавиши. Комбинация клавиш на клавиатуре, нажатие на которые позволяет выполнять различные действия в операционной системе и программах, не прибегая к использованию мыши и не вызывая меню действий',
            ],
            [
                'term' => 'Скрипт',
                'definition' => 'Script. Отдельные последовательности действий, созданные для автоматического выполнения задачи',
            ],
            [
                'term' => 'Система управления базами данных',
                'definition' => 'СУБД, Database Management System. Комплекс программ, позволяющих создать базу данных (БД) и манипулировать данными (вставлять, обновлять, удалять и выбирать)',
            ],
            [
                'term' => 'Первичный ключ',
                'definition' => 'PK, Primary Key. Минимальный набор атрибутов, совокупность значений которых однозначно определяет кортеж в отношении',
            ],
            [
                'term' => 'Внешний ключ',
                'definition' => 'FK, Foreign Key. Столбец или комбинация столбцов, значения которых соответствуют Первичному ключу в другой таблице',
            ],
            [
                'term' => 'WPF',
                'definition' => 'Windows Presentation Foundation. Аналог WinForms, система для построения клиентских приложений Windows с визуально привлекательными возможностями взаимодействия с пользователем, графическая (презентационная) подсистема в составе .NET Framework',
            ],
            [
                'term' => 'Элемент управления',
                'definition' => 'Control. Элемент, который предназначен для взаимодействия с пользователем или для отображения ему какой-либо информации',
            ],
            [
                'term' => 'Настольное приложение',
                'definition' => 'Desktop application. Программное обеспечение, предназначенное для работы на персональных компьютерах',
            ],
            [
                'term' => 'Метод',
                'definition' => 'Method. Функция или процедура, принадлежащая какому-то классу или объекту, состоящая из некоторого количества операторов для выполнения какого-то действия и имеющая набор входных аргументов',
            ],
            [
                'term' => 'Привязка данных',
                'definition' => 'Binding. Процесс, который устанавливает соединение между UI (пользовательским интерфейсом) приложения и бизнес-логикой',
            ],
            [
                'term' => 'OOP',
                'definition' => 'Object-oriented programming (объектно-ориентированное программирование). Методология программирования, основанная на представлении программы в виде совокупности объектов, каждый из которых является экземпляром определенного класса, а классы образуют иерархию наследования',
            ],
            [
                'term' => 'SQL',
                'definition' => 'Structured Query Language (язык структурированных запросов). Декларативный язык программирования, применяемый для создания, модификации и управления данными в реляционной базе данных, управляемой соответствующей системой управления базами данных',
            ],
            [
                'term' => 'EF',
                'definition' => 'Entity Framework. Объектно-ориентированная технология доступа к данным',
            ],
            [
                'term' => 'Паттерн',
                'definition' => 'Pattern. Повторяемая архитектурная конструкция, представляющая собой решение проблемы проектирования в рамках некоторого часто возникающего контекста',
            ],
            [
                'term' => 'Событие',
                'definition' => 'Event. Сообщение, которое возникает в различных точках исполняемого кода при выполнении определенных условий',
            ],
            [
                'term' => 'Класс',
                'definition' => 'Class. Элемент программного обеспечения, описывающий абстрактный тип данных и его частичную или полную реализацию',
            ],
            [
                'term' => 'API',
                'definition' => 'Application programming interface. Интерфейс, позволяющий двум независимым компонентам программного обеспечения обмениваться информацией',
            ],
            [
                'term' => 'HTTP',
                'definition' => 'HyperText Transfer Protocol (протокол передачи гипертекста). Протокол прикладного уровня передачи данных изначально — в виде гипертекстовых документов в формате «HTML», в настоящий момент используется для передачи произвольных данных',
            ],
            [
                'term' => 'JSON',
                'definition' => 'JavaScript Object Notation. Текстовый формат обмена данными, основанный на JavaScript',
            ],
            [
                'term' => 'XML',
                'definition' => 'eXtensible Markup Language. Расширяемый язык разметки',
            ],
            [
                'term' => 'Запрос',
                'definition' => 'Query. Средство выбора необходимой информации из базы данных',
            ],
            [
                'term' => 'Фреймворк',
                'definition' => 'Framework. Программная платформа, определяющая структуру программной системы; программное обеспечение, облегчающее разработку и объединение разных компонентов большого программного проекта',
            ],
            [
                'term' => 'Интерфейс пользователя или пользовательский интерфейс',
                'definition' => 'UI. Интерфейс, обеспечивающий передачу информации между пользователем-человеком и программно-аппаратными компонентами компьютерной системы',
            ],
            [
                'term' => 'Конструктор класса',
                'definition' => 'Constructor. Специальный блок инструкций, вызываемый при создании объекта',
            ],
            [
                'term' => 'Мобильное приложение',
                'definition' => 'Mobile application. Программное обеспечение, предназначенное для работы на смартфонах, планшетах и других мобильных устройствах, разработанное для конкретной платформы (iOS, Android, Windows Phone и т. д.)',
            ],
            [
                'term' => 'Намерение',
                'definition' => 'Intent. Программный механизм, который позволяет пользователям координировать функции различных действий для достижения цели',
            ]
        ]);
    }
}
