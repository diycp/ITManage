<?php
class WapExceptionLogRoute extends CLogRoute
{
    /**
     * Saves log messages through BizExceptionLogger.
     * @param array $logs list of log messages
     */
    protected function processLogs($logs)
    {
        // die('pricess log');
        foreach ($logs as $log) {
            $logMessage = $this->formatLogMessage($log[0],$log[1],$log[2],$log[3]);
            WapLogger::getLogger('exception')->error($logMessage);
        }
    }

    protected function formatLogMessage($message,$level,$category,$time)
    {
        $message .= "\nRequest Params:\n".json_encode($_REQUEST);
        return "$message\n\n";
    }
}
