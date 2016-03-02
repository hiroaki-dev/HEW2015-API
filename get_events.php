<?php
/**
 * Created by PhpStorm.
 * User: hiroaki
 * Date: 2016/02/16
 * Time: 0:54
 */

header('Content-type: application/json');
//echo '{
//  "events": [
//    {
//      "id": 1,
//      "name": "Voice 2015年度 前期",
//      "start": "1000-01-01 00:00:00",
//      "end": "1000-01-01 00:00:00"
//    }
//  ]
//}
//';


// echo '{ "events": [ { "id": 2, "name": "Voice2016 前期", "start": "2016-07-20 00:00:00", "end": "2016-07-20 23:59:59" },{ "id": 3, "name": "Voice2016 後期", "start": "2016-12-20 00:00:00", "end": "2016-12-20 23:59:59" } ] }';

// echo '{
//   "events": [
//     {
//       "id": 2,
//       "name": "Voice 2015年度 後期",
//       "start": "2015-12-01 00:00:00",
//       "end": "2015-12-01 23:59:59",
//       "category": {
//            "event_category": {
//                "name": "VOS 青",
//                "opinion_flag": true,
//                "good_flag": false,
//                "question_flag": true,
//                "questionnaire": [
//                    {
//                        "line_num": 1,
//                       "content": "担当教官の授業はわかりやすかったですか？",
//                       "choice1": "とてもわかりにくい",
//                       "choice2": "わかりにくい",
//                       "choice3": "ふつう",
//                       "choice4": "わかりやすい",
//                       "choice5": "とてもわかりやすい"
//                   },
//                   {
//                       "line_num": 2,
//                       "content": "板書はわかりやすかったですか？",
//                       "choice1": "とてもわかりにくい",
//                       "choice2": "わかりにくい",
//                       "choice3": "ふつう",
//                       "choice4": "わかりやすい",
//                       "choice5": "とてもわかりやすい"
//                   },
//                   {
//                       "line_num": 3,
//                       "content": "質問に真剣に答えてくれましたか？",
//                       "choice1": "とてもわかりにくい",
//                       "choice2": "わかりにくい",
//                       "choice3": "ふつう",
//                       "choice4": "わかりやすい",
//                       "choice5": "とてもわかりやすい"
//                   }
//                 ]
//               },
//               "booths": [
//                   {
//                       "id": "VL16JV22",
//                       "name": "JV22",
//                       "description": "JV22のVOS。この回答結果は担当教官に通知されます。真剣に入力してください。",
//                       "representative": "山田 忠明",
//                       "good": -1
//                   },
//                   {
//                       "id": "VL16WP23",
//                       "name": "WP23",
//                       "description": "WP23のVOS。この回答結果は担当教官に通知されます。真剣に入力してください。",
//                       "representative": "河島 智弘",
//                       "good": -1
//                   }
//               ]
//           }
//       }
//   ]
// }
// ';

// echo '{
//   "events": [
//     {
//       "id": 1,
//       "name": "Voice 2015年度 前期",
//       "start": "2015-07-01 00:00:00",
//       "end": "2015-07-01 23:59:59",
//       "category": {
//            "event_category": {
//                "id": 1,
//                "name": "VOS 青",
//                "opinion_flag": true,
//                "good_flag": false,
//                "question_flag": true,
//                "questionnaire": [
//                    {
//                        "line_num": 1,
//                       "content": "担当教官の授業はわかりやすかったですか？",
//                       "choice1": "とてもわかりにくい",
//                       "choice2": "わかりにくい",
//                       "choice3": "ふつう",
//                       "choice4": "わかりやすい",
//                       "choice5": "とてもわかりやすい"
//                   },
//                   {
//                       "line_num": 2,
//                       "content": "板書はわかりやすかったですか？",
//                       "choice1": "とてもわかりにくい",
//                       "choice2": "わかりにくい",
//                       "choice3": "ふつう",
//                       "choice4": "わかりやすい",
//                       "choice5": "とてもわかりやすい"
//                   },
//                   {
//                       "line_num": 3,
//                       "content": "質問に真剣に答えてくれましたか？",
//                       "choice1": "とてもわかりにくい",
//                       "choice2": "わかりにくい",
//                       "choice3": "ふつう",
//                       "choice4": "わかりやすい",
//                       "choice5": "とてもわかりやすい"
//                   }
//                 ]
//               },
//               "booths": [
//                   {
//                       "id": "VP15JV22",
//                       "name": "JV22",
//                       "description": "JV22のVOS。この回答結果は担当教官に通知されます。真剣に入力してください。",
//                       "representative": "山田 忠明",
//                       "good": -1
//                   },
//                   {
//                       "id": "VP15WP23",
//                       "name": "WP23",
//                       "description": "WP23のVOS。この回答結果は担当教官に通知されます。真剣に入力してください。",
//                       "representative": "河島 智弘",
//                       "good": -1
//                   }
//               ]
//           }
//       },
//       {
//         "id": 2,
//         "name": "Voice 2015年度 後期",
//         "start": "2015-12-01 00:00:00",
//         "end": "2015-12-01 23:59:59",
//         "category": {
//              "event_category": {
//                  "id": 1,
//                  "name": "VOS 青",
//                  "opinion_flag": true,
//                  "good_flag": false,
//                  "question_flag": true,
//                  "questionnaire": [
//                      {
//                          "line_num": 1,
//                         "content": "担当教官の授業はわかりやすかったですか？",
//                         "choice1": "とてもわかりにくい",
//                         "choice2": "わかりにくい",
//                         "choice3": "ふつう",
//                         "choice4": "わかりやすい",
//                         "choice5": "とてもわかりやすい"
//                     },
//                     {
//                         "line_num": 2,
//                         "content": "板書はわかりやすかったですか？",
//                         "choice1": "とてもわかりにくい",
//                         "choice2": "わかりにくい",
//                         "choice3": "ふつう",
//                         "choice4": "わかりやすい",
//                         "choice5": "とてもわかりやすい"
//                     },
//                     {
//                         "line_num": 3,
//                         "content": "質問に真剣に答えてくれましたか？",
//                         "choice1": "とてもわかりにくい",
//                         "choice2": "わかりにくい",
//                         "choice3": "ふつう",
//                         "choice4": "わかりやすい",
//                         "choice5": "とてもわかりやすい"
//                     }
//                   ]
//                 },
//                 "booths": [
//                     {
//                         "id": "VL15JV22",
//                         "name": "JV22",
//                         "description": "JV22のVOS。この回答結果は担当教官に通知されます。真剣に入力してください。",
//                         "representative": "山田 忠明",
//                         "good": -1
//                     },
//                     {
//                         "id": "VL15WP23",
//                         "name": "WP23",
//                         "description": "WP23のVOS。この回答結果は担当教官に通知されます。真剣に入力してください。",
//                         "representative": "河島 智弘",
//                         "good": -1
//                     }
//                 ]
//             }
//         }
//   ]
// }
// ';

// echo '{
//   "events": [
//     {
//       "id": 1,
//       "name": "Voice 2015年度 前期",
//       "start": "2015-07-01 00:00:00",
//       "end": "2015-07-01 23:59:59",
//       "category": [
//           {
//            "event_category": {
//                "id": 1,
//                "name": "VOS 青",
//                "opinion_flag": true,
//                "good_flag": false,
//                "question_flag": true,
//                "questionnaire": [
//                    {
//                        "line_num": 1,
//                       "content": "担当教官の授業はわかりやすかったですか？",
//                       "choice1": "とてもわかりにくい",
//                       "choice2": "わかりにくい",
//                       "choice3": "ふつう",
//                       "choice4": "わかりやすい",
//                       "choice5": "とてもわかりやすい"
//                   },
//                   {
//                       "line_num": 2,
//                       "content": "板書はわかりやすかったですか？",
//                       "choice1": "とてもわかりにくい",
//                       "choice2": "わかりにくい",
//                       "choice3": "ふつう",
//                       "choice4": "わかりやすい",
//                       "choice5": "とてもわかりやすい"
//                   },
//                   {
//                       "line_num": 3,
//                       "content": "質問に真剣に答えてくれましたか？",
//                       "choice1": "とてもわかりにくい",
//                       "choice2": "わかりにくい",
//                       "choice3": "ふつう",
//                       "choice4": "わかりやすい",
//                       "choice5": "とてもわかりやすい"
//                   }
//                 ]
//               },
//               "booths": [
//                   {
//                       "id": "VP15JV22B",
//                       "name": "JV22",
//                       "description": "JV22のVOS。この回答結果は担当教官に通知されます。真剣に入力してください。",
//                       "representative": "山田 忠明",
//                       "good": -1
//                   },
//                   {
//                       "id": "VP15WP23B",
//                       "name": "WP23",
//                       "description": "WP23のVOS。この回答結果は担当教官に通知されます。真剣に入力してください。",
//                       "representative": "河島 智弘",
//                       "good": -1
//                   }
//               ]
//           },
//           {
//            "event_category": {
//                "id": 2,
//                "name": "VOS 赤",
//                "opinion_flag": false,
//                "good_flag": false,
//                "question_flag": true,
//                "questionnaire": [
//                    {
//                       "line_num": 1,
//                       "content": "この授業をきちんと理解しましたか？",
//                       "choice1": "全然理解できていない",
//                       "choice2": "理解できていない",
//                       "choice3": "ふつう",
//                       "choice4": "理解できた",
//                       "choice5": "とても理解できた"
//                   },
//                   {
//                       "line_num": 2,
//                       "content": "ノートはしっかりとりましたか？",
//                       "choice1": "全く取らなかった",
//                       "choice2": "取らなかった",
//                       "choice3": "ふつう",
//                       "choice4": "とった",
//                       "choice5": "しっかりととった"
//                   },
//                   {
//                       "line_num": 3,
//                       "content": "学校だけでなく自宅でも自習しましたか？",
//                       "choice1": "全くしなかった",
//                       "choice2": "しなかった",
//                       "choice3": "ふつう",
//                       "choice4": "した",
//                       "choice5": "とてもした"
//                   }
//                 ]
//               },
//               "booths": [
//                   {
//                       "id": "VP15JV22R",
//                       "name": "JV22",
//                       "description": "JV22のVOS。この回答結果は担当教官に通知されます。真剣に入力してください。",
//                       "representative": "山田 忠明",
//                       "good": -1
//                   },
//                   {
//                       "id": "VP15WP23R",
//                       "name": "WP23",
//                       "description": "WP23のVOS。この回答結果は担当教官に通知されます。真剣に入力してください。",
//                       "representative": "河島 智弘",
//                       "good": -1
//                   }
//               ]
//           }
//       ]
//   },
//   {
//         "id": 2,
//         "name": "Voice 2015年度 後期",
//         "start": "2015-12-01 00:00:00",
//         "end": "2015-12-01 23:59:59",
//         "category": [
//             {
//              "event_category": {
//                  "id": 1,
//                  "name": "VOS 青",
//                  "opinion_flag": true,
//                  "good_flag": false,
//                  "question_flag": true,
//                  "questionnaire": [
//                      {
//                          "line_num": 1,
//                         "content": "担当教官の授業はわかりやすかったですか？",
//                         "choice1": "とてもわかりにくい",
//                         "choice2": "わかりにくい",
//                         "choice3": "ふつう",
//                         "choice4": "わかりやすい",
//                         "choice5": "とてもわかりやすい"
//                     },
//                     {
//                         "line_num": 2,
//                         "content": "板書はわかりやすかったですか？",
//                         "choice1": "とてもわかりにくい",
//                         "choice2": "わかりにくい",
//                         "choice3": "ふつう",
//                         "choice4": "わかりやすい",
//                         "choice5": "とてもわかりやすい"
//                     },
//                     {
//                         "line_num": 3,
//                         "content": "質問に真剣に答えてくれましたか？",
//                         "choice1": "とてもわかりにくい",
//                         "choice2": "わかりにくい",
//                         "choice3": "ふつう",
//                         "choice4": "わかりやすい",
//                         "choice5": "とてもわかりやすい"
//                     }
//                   ]
//                 },
//                 "booths": [
//                     {
//                         "id": "VP15JV22B",
//                         "name": "JV22",
//                         "description": "JV22のVOS。この回答結果は担当教官に通知されます。真剣に入力してください。",
//                         "representative": "山田 忠明",
//                         "good": -1
//                     },
//                     {
//                         "id": "VP15WP23B",
//                         "name": "WP23",
//                         "description": "WP23のVOS。この回答結果は担当教官に通知されます。真剣に入力してください。",
//                         "representative": "河島 智弘",
//                         "good": -1
//                     }
//                 ]
//             },
//             {
//              "event_category": {
//                  "id": 2,
//                  "name": "VOS 赤",
//                  "opinion_flag": false,
//                  "good_flag": false,
//                  "question_flag": true,
//                  "questionnaire": [
//                      {
//                         "line_num": 1,
//                         "content": "この授業をきちんと理解しましたか？",
//                         "choice1": "全然理解できていない",
//                         "choice2": "理解できていない",
//                         "choice3": "ふつう",
//                         "choice4": "理解できた",
//                         "choice5": "とても理解できた"
//                     },
//                     {
//                         "line_num": 2,
//                         "content": "ノートはしっかりとりましたか？",
//                         "choice1": "全く取らなかった",
//                         "choice2": "取らなかった",
//                         "choice3": "ふつう",
//                         "choice4": "とった",
//                         "choice5": "しっかりととった"
//                     },
//                     {
//                         "line_num": 3,
//                         "content": "学校だけでなく自宅でも自習しましたか？",
//                         "choice1": "全くしなかった",
//                         "choice2": "しなかった",
//                         "choice3": "ふつう",
//                         "choice4": "した",
//                         "choice5": "とてもした"
//                     }
//                   ]
//                 },
//                 "booths": [
//                     {
//                         "id": "VP15JV22R",
//                         "name": "JV22",
//                         "description": "JV22のVOS。この回答結果は担当教官に通知されます。真剣に入力してください。",
//                         "representative": "山田 忠明",
//                         "good": -1
//                     },
//                     {
//                         "id": "VP15WP23R",
//                         "name": "WP23",
//                         "description": "WP23のVOS。この回答結果は担当教官に通知されます。真剣に入力してください。",
//                         "representative": "河島 智弘",
//                         "good": -1
//                     }
//                 ]
//             }
//         ]
//     }
// ]
// }
// ';


echo '{
  "events": [
    {
      "id": 1,
      "name": "Voice 2015年度 前期",
      "start": "2015-07-01 00:00:00",
      "end": "2015-07-01 23:59:59",
      "category": [
          {
           "id": "1_1",
           "event_category": {
               "id": 1,
               "name": "VOS 青",
               "opinion_flag": true,
               "good_flag": false,
               "question_flag": true,
               "questionnaire": [
                   {
                       "id": "1_1",
                       "event_category_id": 1,
                       "line_num": 1,
                      "content": "担当教官の授業はわかりやすかったですか？",
                      "choice1": "とてもわかりにくい",
                      "choice2": "わかりにくい",
                      "choice3": "ふつう",
                      "choice4": "わかりやすい",
                      "choice5": "とてもわかりやすい"
                  },
                  {
                      "id": "1_2",
                      "event_category_id": 1,
                      "line_num": 2,
                      "content": "板書はわかりやすかったですか？",
                      "choice1": "とてもわかりにくい",
                      "choice2": "わかりにくい",
                      "choice3": "ふつう",
                      "choice4": "わかりやすい",
                      "choice5": "とてもわかりやすい"
                  },
                  {
                      "id": "1_3",
                      "event_category_id": 1,
                      "line_num": 3,
                      "content": "質問に真剣に答えてくれましたか？",
                      "choice1": "とてもわかりにくい",
                      "choice2": "わかりにくい",
                      "choice3": "ふつう",
                      "choice4": "わかりやすい",
                      "choice5": "とてもわかりやすい"
                  }
                ]
              },
              "booths": [
                  {
                      "id": "VP15JV22B",
                      "name": "JV22",
                      "description": "JV22のVOS。この回答結果は担当教官に通知されます。真剣に入力してください。",
                      "representative": "山田 忠明",
                      "good": -1
                  },
                  {
                      "id": "VP15WP23B",
                      "name": "WP23",
                      "description": "WP23のVOS。この回答結果は担当教官に通知されます。真剣に入力してください。",
                      "representative": "河島 智弘",
                      "good": -1
                  }
              ]
          },
          {
           "id": "1_2",
           "event_category": {
               "id": 2,
               "name": "VOS 赤",
               "opinion_flag": false,
               "good_flag": false,
               "question_flag": true,
               "questionnaire": [
                   {
                       "id": "2_1",
                       "event_category_id": 2,
                      "line_num": 1,
                      "content": "この授業をきちんと理解しましたか？",
                      "choice1": "全然理解できていない",
                      "choice2": "理解できていない",
                      "choice3": "ふつう",
                      "choice4": "理解できた",
                      "choice5": "とても理解できた"
                  },
                  {
                      "id": "2_2",
                      "event_category_id": 2,
                      "line_num": 2,
                      "content": "ノートはしっかりとりましたか？",
                      "choice1": "全く取らなかった",
                      "choice2": "取らなかった",
                      "choice3": "ふつう",
                      "choice4": "とった",
                      "choice5": "しっかりととった"
                  },
                  {
                      "id": "2_3",
                      "event_category_id": 2,
                      "line_num": 3,
                      "content": "学校だけでなく自宅でも自習しましたか？",
                      "choice1": "全くしなかった",
                      "choice2": "しなかった",
                      "choice3": "ふつう",
                      "choice4": "した",
                      "choice5": "とてもした"
                  }
                ]
              },
              "booths": [
                  {
                      "id": "VP15JV22R",
                      "name": "JV22",
                      "description": "JV22のVOS。この回答結果は担当教官に通知されます。真剣に入力してください。",
                      "representative": "山田 忠明",
                      "good": -1
                  },
                  {
                      "id": "VP15WP23R",
                      "name": "WP23",
                      "description": "WP23のVOS。この回答結果は担当教官に通知されます。真剣に入力してください。",
                      "representative": "河島 智弘",
                      "good": -1
                  }
              ]
          }
      ]
  },
  {
        "id": 2,
        "name": "Voice 2015年度 後期",
        "start": "2015-12-01 00:00:00",
        "end": "2015-12-01 23:59:59",
        "category": [
            {
             "id": "2_1",
             "event_category": {
                 "id": 1,
                 "name": "VOS 青",
                 "opinion_flag": true,
                 "good_flag": false,
                 "question_flag": true,
                 "questionnaire": [
                     {
                         "id": "1_1",
                         "event_category_id": 1,
                         "line_num": 1,
                        "content": "担当教官の授業はわかりやすかったですか？",
                        "choice1": "とてもわかりにくい",
                        "choice2": "わかりにくい",
                        "choice3": "ふつう",
                        "choice4": "わかりやすい",
                        "choice5": "とてもわかりやすい"
                    },
                    {
                        "id": "1_2",
                        "event_category_id": 1,
                        "line_num": 2,
                        "content": "板書はわかりやすかったですか？",
                        "choice1": "とてもわかりにくい",
                        "choice2": "わかりにくい",
                        "choice3": "ふつう",
                        "choice4": "わかりやすい",
                        "choice5": "とてもわかりやすい"
                    },
                    {
                        "id": "1_3",
                        "event_category_id": 1,
                        "line_num": 3,
                        "content": "質問に真剣に答えてくれましたか？",
                        "choice1": "とてもわかりにくい",
                        "choice2": "わかりにくい",
                        "choice3": "ふつう",
                        "choice4": "わかりやすい",
                        "choice5": "とてもわかりやすい"
                    }
                  ]
                },
                "booths": [
                    {
                        "id": "VL15JV22B",
                        "name": "JV22",
                        "description": "JV22のVOS。この回答結果は担当教官に通知されます。真剣に入力してください。",
                        "representative": "山田 忠明",
                        "good": -1
                    },
                    {
                        "id": "VL15WP23B",
                        "name": "WP23",
                        "description": "WP23のVOS。この回答結果は担当教官に通知されます。真剣に入力してください。",
                        "representative": "河島 智弘",
                        "good": -1
                    }
                ]
            },
            {
             "id": "2_2",
             "event_category": {
                 "id": 2,
                 "name": "VOS 赤",
                 "opinion_flag": false,
                 "good_flag": false,
                 "question_flag": true,
                 "questionnaire": [
                     {
                         "id": "2_1",
                         "event_category_id": 2,
                        "line_num": 1,
                        "content": "この授業をきちんと理解しましたか？",
                        "choice1": "全然理解できていない",
                        "choice2": "理解できていない",
                        "choice3": "ふつう",
                        "choice4": "理解できた",
                        "choice5": "とても理解できた"
                    },
                    {
                        "id": "2_2",
                        "event_category_id": 2,
                        "line_num": 2,
                        "content": "ノートはしっかりとりましたか？",
                        "choice1": "全く取らなかった",
                        "choice2": "取らなかった",
                        "choice3": "ふつう",
                        "choice4": "とった",
                        "choice5": "しっかりととった"
                    },
                    {
                        "id": "2_3",
                        "event_category_id": 2,
                        "line_num": 3,
                        "content": "学校だけでなく自宅でも自習しましたか？",
                        "choice1": "全くしなかった",
                        "choice2": "しなかった",
                        "choice3": "ふつう",
                        "choice4": "した",
                        "choice5": "とてもした"
                    }
                  ]
                },
                "booths": [
                    {
                        "id": "VL15JV22R",
                        "name": "JV22",
                        "description": "JV22のVOS。この回答結果は担当教官に通知されます。真剣に入力してください。",
                        "representative": "山田 忠明",
                        "good": -1
                    },
                    {
                        "id": "VL15WP23R",
                        "name": "WP23",
                        "description": "WP23のVOS。この回答結果は担当教官に通知されます。真剣に入力してください。",
                        "representative": "河島 智弘",
                        "good": -1
                    }
                ]
            }
        ]
    }
]
}
';
