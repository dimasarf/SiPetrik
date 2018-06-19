package sample;

import javafx.concurrent.Task;

public class BackGroundWorker extends Task<Integer> {
    @Override
    protected Integer call() throws Exception {
        Thread.sleep(500);
        return 10;
    }

    @Override
    protected void updateProgress(double workDone, double max) {
        super.updateProgress(workDone, max);
    }
}
