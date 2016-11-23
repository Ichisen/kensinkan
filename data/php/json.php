<?php
	class JSON
	{
		public static function Encode($obj)
		{
			return json_encode($obj);
		}

		public static function Decode($json, $toAssoc = false)
		{
			$result = json_decode($json, $toAssoc);

			switch (json_last_error()) {
				case JSON_ERROR_NONE:

				break;
				case JSON_ERROR_DEPTH:
					$error = ' - Достигнута максимальная глубина стека';
				break;
				case JSON_ERROR_STATE_MISMATCH:
					$error = ' - Некорректные разряды или не совпадение режимов';
				break;
				case JSON_ERROR_CTRL_CHAR:
					$error = ' - Некорректный управляющий символ';
				break;
				case JSON_ERROR_SYNTAX:
					$error = ' - Синтаксическая ошибка, не корректный JSON';
				break;
				case JSON_ERROR_UTF8:
					$error = ' - Некорректные символы UTF-8, возможно неверная кодировка';
				break;
				default:
					$error = ' - Неизвестная ошибка';
				break;
			}


			if (!empty($error)){
				echo $error;

				return null;
			} else {
				return $result;
			}
		}
	}
?>