<?php

$function = $_POST['function'];

$log = array();

switch ($function) {

    case('status'):
        if (file_exists('chat.json')) {
            $lines = file_get_contents('chat.json');
            $lines = json_decode($lines, true);
            $log['state'] = count($lines);


        }


        break;

    case('update'):
        $state = $_POST['state'];
        if (file_exists('chat.json')) {
            $lines = file_get_contents('chat.json');
            $lines = json_decode($lines, true);
        }
        $count = count($lines);
        if ($state == $count) {
            $log['state'] = $state;
            $log['text'] = false;

        } else {
            $text = array();
            $log['state'] = $state + count($lines) - $state;
            foreach ($lines as $line_num => $line) {
                if ($line_num >= $state) {
                    $text[] = $line;
                }

            }
            $log['text'] = $text;
        }

        break;

    case('send'):
        $nickname = htmlentities(strip_tags($_POST['nickname']));
        $message = htmlentities(strip_tags($_POST['message']));
        if (($message) != "\n") {
            $json_file = file_get_contents('chat.json');
            $temp_array = json_decode($json_file, true);
            $export_data = [
                'nickname' => $_POST['nickname'],
                'message' => $_POST['message'],
                'date' => $_POST['date']
            ];
            $temp_array[] = $export_data;
            $json_data = json_encode($temp_array, JSON_PRETTY_PRINT);
            file_put_contents('chat.json', $json_data);

        }
        break;

    case('get_answer'):
        $antwoord = htmlentities($_POST['word']);
        $answer_list = file_get_contents('answer.json');
        $temp_array = json_decode($answer_list, true);
        $export_data = [
            'answer' => $_POST['answer']
        ];
        $temp_array = $export_data;
        $json_data = json_encode($temp_array, JSON_PRETTY_PRINT);
        file_put_contents('answer.json', $json_data);
        $log['answer'] = $temp_array;

        break;

}

echo json_encode($log);


